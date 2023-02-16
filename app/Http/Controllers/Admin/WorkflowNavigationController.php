<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkflowNavigation\BulkDestroyWorkflowNavigation;
use App\Http\Requests\Admin\WorkflowNavigation\DestroyWorkflowNavigation;
use App\Http\Requests\Admin\WorkflowNavigation\IndexWorkflowNavigation;
use App\Http\Requests\Admin\WorkflowNavigation\StoreWorkflowNavigation;
use App\Http\Requests\Admin\WorkflowNavigation\UpdateWorkflowNavigation;
use App\Models\WorkflowNavigation;
use App\Models\Workflow;
use App\Models\WorkflowState;
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

class WorkflowNavigationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexWorkflowNavigation $request
     * @return array|Factory|View
     */
    public function index(IndexWorkflowNavigation $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(WorkflowNavigation::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'workflow_state_id', 'next_workflow_state_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.workflow-navigation.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(Workflow $workflow, WorkflowState $workflowState)
    {
        $this->authorize('admin.workflow-navigation.create');
        $states = WorkflowState::where('workflow_id', '=', $workflow->id)
            ->where('id', '!=', $workflowState->id)
            ->get();

        return view('admin.workflow-navigation.create', compact('workflow', 'workflowState', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWorkflowNavigation $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreWorkflowNavigation $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['next_workflow_state_id'] = $request->getStateId();
        $workflow = WorkflowState::find($request['workflow_state_id']);

        // Store the WorkflowNavigation
        $workflowNavigation = WorkflowNavigation::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/workflow-states/' . $request['workflow_state_id'] . '/show/' . $workflow->workflow_id), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/workflow-navigations');
    }

    /**
     * Display the specified resource.
     *
     * @param WorkflowNavigation $workflowNavigation
     * @throws AuthorizationException
     * @return void
     */
    public function show(WorkflowNavigation $workflowNavigation)
    {
        $this->authorize('admin.workflow-navigation.show', $workflowNavigation);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WorkflowNavigation $workflowNavigation
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(WorkflowNavigation $workflowNavigation)
    {
        $this->authorize('admin.workflow-navigation.edit', $workflowNavigation);


        return view('admin.workflow-navigation.edit', [
            'workflowNavigation' => $workflowNavigation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWorkflowNavigation $request
     * @param WorkflowNavigation $workflowNavigation
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateWorkflowNavigation $request, WorkflowNavigation $workflowNavigation)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values WorkflowNavigation
        $workflowNavigation->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/workflow-navigations'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/workflow-navigations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyWorkflowNavigation $request
     * @param WorkflowNavigation $workflowNavigation
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyWorkflowNavigation $request, WorkflowNavigation $workflowNavigation)
    {
        $workflowNavigation->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyWorkflowNavigation $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyWorkflowNavigation $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    WorkflowNavigation::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
