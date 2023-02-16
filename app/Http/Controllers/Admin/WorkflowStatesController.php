<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkflowState\BulkDestroyWorkflowState;
use App\Http\Requests\Admin\WorkflowState\DestroyWorkflowState;
use App\Http\Requests\Admin\WorkflowState\IndexWorkflowState;
use App\Http\Requests\Admin\WorkflowNavigation\IndexWorkflowNavigation;
use App\Http\Requests\Admin\WorkflowState\StoreWorkflowState;
use App\Http\Requests\Admin\WorkflowState\UpdateWorkflowState;
use App\Models\Workflow;
use App\Models\WorkflowState;
use App\Models\WorkflowNavigation;
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

class WorkflowStatesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexWorkflowState $request
     * @return array|Factory|View
     */
    public function index(IndexWorkflowState $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(WorkflowState::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'workflow_id', 'isactive'],

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

        return view('admin.workflow-state.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(Workflow $workflow)
    {
        $this->authorize('admin.workflow-state.create');
        $id = $workflow->id;
        return view('admin.workflow-state.create', compact('id', 'workflow'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWorkflowState $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreWorkflowState $request)
    {
        // Sanitize input

        $sanitized = $request->getSanitized();
        //return $sanitized;
        // Store the WorkflowState
        $workflowState = WorkflowState::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/workflows/' . $request['workflow_id'] . '/show'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/workflow-states');
    }

    /**
     * Display the specified resource.
     *
     * @param WorkflowState $workflowState
     * @throws AuthorizationException
     * @return void
     */
    public function show(WorkflowState $workflowState, Workflow $workflow, IndexWorkflowNavigation $request)
    {
        $this->authorize('admin.workflow-state.show', $workflowState);

        $data = AdminListing::create(WorkflowNavigation::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'next_workflow_state_id'],

            // set columns to searchIn
            ['id'],

            function ($query) use ($request, $workflowState) {
                //$query->leftJoin('workflow_states', 'workflow_states.id', '=', 'workflow_navigation.next_workflow_state_id')
                $query->where('workflow_state_id', '=', $workflowState->id);
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }


        /*$Documents = AdminListing::create(ApplicantDocument::class)->processRequestAndGet(
            $request,
            ['applicant_documents.id', 'document_types.name', 'received_at'],
            ['applicant_documents.id', 'document_types.name'],
            function ($query) use () {
                $query->where('','');
                    //->leftJoin('document_types', 'document_types.id', '=', 'applicant_documents.document_id')
                    //->where('applicant_documents.applicant_id', '=', $applicantID)
                    //->where('document_types.type', '=', $documentType);
            }
        );*/

        return view('admin.workflow-state.show', [
            'workflowState' => $workflowState,
            //'workflows' => $workflows,
            'data' => $data,
            'worflow' => $workflow
        ]);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WorkflowState $workflowState
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(WorkflowState $workflowState)
    {
        $this->authorize('admin.workflow-state.edit', $workflowState);


        return view('admin.workflow-state.edit', [
            'workflowState' => $workflowState,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWorkflowState $request//
     * @param WorkflowState $workflowState
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateWorkflowState $request, WorkflowState $workflowState)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        //return $sanitized;
        // Update changed values WorkflowState
        $workflowState->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/workflows/' . $request['workflow_id'] . '/show'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/workflow-states');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyWorkflowState $request
     * @param WorkflowState $workflowState
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyWorkflowState $request, WorkflowState $workflowState)
    {
        $workflowState->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyWorkflowState $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyWorkflowState $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    WorkflowState::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
