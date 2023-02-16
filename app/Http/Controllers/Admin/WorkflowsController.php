<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Workflow\BulkDestroyWorkflow;
use App\Http\Requests\Admin\Workflow\DestroyWorkflow;
use App\Http\Requests\Admin\Workflow\IndexWorkflow;
use App\Http\Requests\Admin\WorkflowState\IndexWorkflowState;
use App\Http\Requests\Admin\Workflow\StoreWorkflow;
use App\Http\Requests\Admin\Workflow\UpdateWorkflow;
use App\Models\Workflow;
use App\Models\WorkflowNavigation;
use App\Models\WorkflowState;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PDF;

class WorkflowsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexWorkflow $request
     * @return array|Factory|View
     */
    public function index(IndexWorkflow $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Workflow::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.workflow.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.workflow.create');

        return view('admin.workflow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWorkflow $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreWorkflow $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Workflow
        $workflow = Workflow::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/workflows'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/workflows');
    }

    /**
     * Display the specified resource.
     *
     * @param Workflow $workflow
     * @throws AuthorizationException
     * @return void
     */
    public function show(Workflow $workflow, IndexWorkflowState $request)
    {
        $this->authorize('admin.workflow.show', $workflow);

        //return 'hola';
        /*$codigoQr = QrCode::size(100)->generate('texto');
        $pdf = PDF::loadView('vista_pdf', ['valor' => $codigoQr]);
        return $pdf->download('constancias.pdf');*/

        $workflows = Workflow::all();
        $graph = WorkflowState::where('workflow_id', '=', $workflow->id)->orderBy('id')->get();

        $transitions = WorkflowNavigation::all();
        //return $transitions;
        $datatransitions = [];

        foreach ($transitions as $key => $value) {
            try {

                $datatransitions[] = [
                    'from' => $value->id ? $value->from->name : "",
                    'to' => $value->id ? $value->next->name : "",

                ];
            } catch (\Throwable $th) {
                $error[] = [
                    'id' => trim($value->id),
                ];
            }
        }

        //return $datatransitions;

        $data = AdminListing::create(WorkflowState::class)
            ->processRequestAndGet(

                // pass the request object
                $request,

                // set columns to query
                ['id', 'name', 'color', 'workflow_id', 'isactive'],

                // set columns to searchIn
                ['id', 'name', 'color', 'workflows.name'],

                function ($query) use ($request, $workflow) {
                    $query->leftJoin('workflows', 'workflows.id', '=', 'workflow_states.workflow_id')
                        ->where('workflow_id', '=', $workflow->id);
                }
            );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        $diagramData = [];
        $nodeDataArray = [];
        $diagramData[] = [
            'nodeDataArray' => [
                ['key' => '1', 'text' => "Alpha", 'color' => 'lightblue'],
                ['key' => '2', 'text' => "Beta", 'color' => 'orange'],
            ],
            'linkDataArray' => [
                ['from' => '1', 'to' => '2']
            ],
            'currentNode' => null,
            'savedModelText' => "",
            'counter' => 1,
            'counter2' => 4,

        ];

        // TODO your code goes here
        return view('admin.workflow.show', [
            'workflow' => $workflow,
            'workflows' => $workflows,
            'graph' => $graph,
            'data' => $data,
            'diagramData' => $diagramData,
            'datatransitions' => $datatransitions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Workflow $workflow
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Workflow $workflow)
    {
        $this->authorize('admin.workflow.edit', $workflow);


        return view('admin.workflow.edit', [
            'workflow' => $workflow,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWorkflow $request
     * @param Workflow $workflow
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateWorkflow $request, Workflow $workflow)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Workflow
        $workflow->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/workflows'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/workflows');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyWorkflow $request
     * @param Workflow $workflow
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyWorkflow $request, Workflow $workflow)
    {
        $workflow->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyWorkflow $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyWorkflow $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Workflow::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
