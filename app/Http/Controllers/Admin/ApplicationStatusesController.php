<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApplicationStatus\BulkDestroyApplicationStatus;
use App\Http\Requests\Admin\ApplicationStatus\DestroyApplicationStatus;
use App\Http\Requests\Admin\ApplicationStatus\IndexApplicationStatus;
use App\Http\Requests\Admin\ApplicationStatus\StoreApplicationStatus;
use App\Http\Requests\Admin\ApplicationStatus\StoreApplicationStatusHistory;
use App\Http\Requests\Admin\ApplicationStatus\UpdateApplicationStatus;
use App\Models\ApplicationStatus;
use App\Models\Task;
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
use Illuminate\Support\Facades\Auth;

class ApplicationStatusesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexApplicationStatus $request
     * @return array|Factory|View
     */
    public function index(IndexApplicationStatus $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ApplicationStatus::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'task_id', 'status_id', 'user', 'description'],

            // set columns to searchIn
            ['id', 'user', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.application-status.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.application-status.create');

        return view('admin.application-status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreApplicationStatus $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreApplicationStatus $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        //return $sanitized;
        $task = Task::find($sanitized['task_id']);
        $exp = $task->NroExp;
        //return $exp;
        // Store the ApplicationStatus
        $applicationStatus = ApplicationStatus::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/applications/' . $exp . '/show'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/application-statuses');
    }


    public function storeHistory(StoreApplicationStatusHistory $request)
    {


        //return $request->user['id'];
        $applicationStatus = ApplicationStatus::find($request->id);
        //return $applicationStatus;
        $applicationStatus->description = $request->description;
        $applicationStatus->user_id = Auth::user()->id;
        $applicationStatus->save();

        //return $applicationStatus->task_id;

        $task = Task::find($applicationStatus->task_id);
        //return $task;
        $exp = $task->NroExp;

        if ($request->ajax()) {
            return ['redirect' => url('admin/applications/' . $exp . '/show'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/application-statuses');
    }

    /**
     * Display the specified resource.
     *
     * @param ApplicationStatus $applicationStatus
     * @throws AuthorizationException
     * @return void
     */
    public function show(ApplicationStatus $applicationStatus)
    {
        $this->authorize('admin.application-status.show', $applicationStatus);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ApplicationStatus $applicationStatus
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ApplicationStatus $applicationStatus)
    {
        $this->authorize('admin.application-status.edit', $applicationStatus);


        return view('admin.application-status.edit', [
            'applicationStatus' => $applicationStatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateApplicationStatus $request
     * @param ApplicationStatus $applicationStatus
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateApplicationStatus $request, ApplicationStatus $applicationStatus)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ApplicationStatus
        $applicationStatus->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/application-statuses'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/application-statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyApplicationStatus $request
     * @param ApplicationStatus $applicationStatus
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyApplicationStatus $request, ApplicationStatus $applicationStatus)
    {
        $applicationStatus->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyApplicationStatus $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyApplicationStatus $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ApplicationStatus::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
