<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkExperience\BulkDestroyWorkExperience;
use App\Http\Requests\Admin\WorkExperience\DestroyWorkExperience;
use App\Http\Requests\Admin\WorkExperience\IndexWorkExperience;
use App\Http\Requests\Admin\WorkExperience\StoreWorkExperience;
use App\Http\Requests\Admin\WorkExperience\UpdateWorkExperience;
use App\Models\WorkExperience;
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

class WorkExperienceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexWorkExperience $request
     * @return array|Factory|View
     */
    public function index(IndexWorkExperience $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(WorkExperience::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'resume_id', 'company', 'position', 'start', 'end', 'end_reason_id'],

            // set columns to searchIn
            ['id', 'company', 'position', 'tasks', 'contact']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.work-experience.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.work-experience.create');

        return view('admin.work-experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWorkExperience $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreWorkExperience $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the WorkExperience
        $workExperience = WorkExperience::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/work-experiences'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/work-experiences');
    }

    /**
     * Display the specified resource.
     *
     * @param WorkExperience $workExperience
     * @throws AuthorizationException
     * @return void
     */
    public function show(WorkExperience $workExperience)
    {
        $this->authorize('admin.work-experience.show', $workExperience);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WorkExperience $workExperience
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(WorkExperience $workExperience)
    {
        $this->authorize('admin.work-experience.edit', $workExperience);


        return view('admin.work-experience.edit', [
            'workExperience' => $workExperience,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWorkExperience $request
     * @param WorkExperience $workExperience
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateWorkExperience $request, WorkExperience $workExperience)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values WorkExperience
        $workExperience->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/work-experiences'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/work-experiences');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyWorkExperience $request
     * @param WorkExperience $workExperience
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyWorkExperience $request, WorkExperience $workExperience)
    {
        $workExperience->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyWorkExperience $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyWorkExperience $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    WorkExperience::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
