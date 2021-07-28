<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DisabilityResume\BulkDestroyDisabilityResume;
use App\Http\Requests\Admin\DisabilityResume\DestroyDisabilityResume;
use App\Http\Requests\Admin\DisabilityResume\IndexDisabilityResume;
use App\Http\Requests\Admin\DisabilityResume\StoreDisabilityResume;
use App\Http\Requests\Admin\DisabilityResume\UpdateDisabilityResume;
use App\Models\DisabilityResume;
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

class DisabilityResumesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDisabilityResume $request
     * @return array|Factory|View
     */
    public function index(IndexDisabilityResume $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(DisabilityResume::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'resume_id', 'disability_id', 'cause', 'percent', 'certificate', 'certificate_date'],

            // set columns to searchIn
            ['id', 'cause', 'certificate']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.disability-resume.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.disability-resume.create');

        return view('admin.disability-resume.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDisabilityResume $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDisabilityResume $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the DisabilityResume
        $disabilityResume = DisabilityResume::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/disability-resumes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/disability-resumes');
    }

    /**
     * Display the specified resource.
     *
     * @param DisabilityResume $disabilityResume
     * @throws AuthorizationException
     * @return void
     */
    public function show(DisabilityResume $disabilityResume)
    {
        $this->authorize('admin.disability-resume.show', $disabilityResume);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DisabilityResume $disabilityResume
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(DisabilityResume $disabilityResume)
    {
        $this->authorize('admin.disability-resume.edit', $disabilityResume);


        return view('admin.disability-resume.edit', [
            'disabilityResume' => $disabilityResume,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDisabilityResume $request
     * @param DisabilityResume $disabilityResume
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDisabilityResume $request, DisabilityResume $disabilityResume)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values DisabilityResume
        $disabilityResume->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/disability-resumes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/disability-resumes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDisabilityResume $request
     * @param DisabilityResume $disabilityResume
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDisabilityResume $request, DisabilityResume $disabilityResume)
    {
        $disabilityResume->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDisabilityResume $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDisabilityResume $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DisabilityResume::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
