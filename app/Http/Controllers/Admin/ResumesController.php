<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resume\BulkDestroyResume;
use App\Http\Requests\Admin\Resume\DestroyResume;
use App\Http\Requests\Admin\Resume\IndexResume;
use App\Http\Requests\Admin\Resume\StoreResume;
use App\Http\Requests\Admin\Resume\UpdateResume;
use App\Models\Resume;
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

class ResumesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexResume $request
     * @return array|Factory|View
     */
    public function index()
    {
        // create and AdminListing instance for a specific model and
        /*$data = AdminListing::create(Resume::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'names', 'last_names', 'government_id', 'birthdate', 'gender', 'nationality', 'address', 'neighborhood', 'phone', 'email'],

            // set columns to searchIn
            ['id', 'names', 'last_names', 'government_id', 'gender', 'nationality', 'address', 'neighborhood', 'phone', 'email']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }*/
        $resume = '';

        return view('applicant.resume.index', compact('resume'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        //$this->authorize('admin.resume.create');

        return view('applicant.resume.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreResume $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreResume $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Resume
        $resume = Resume::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/resumes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/resumes');
    }

    /**
     * Display the specified resource.
     *
     * @param Resume $resume
     * @throws AuthorizationException
     * @return void
     */
    public function show(Resume $resume)
    {
        $this->authorize('admin.resume.show', $resume);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Resume $resume
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Resume $resume)
    {
        $this->authorize('admin.resume.edit', $resume);


        return view('admin.resume.edit', [
            'resume' => $resume,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateResume $request
     * @param Resume $resume
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateResume $request, Resume $resume)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Resume
        $resume->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/resumes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/resumes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyResume $request
     * @param Resume $resume
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyResume $request, Resume $resume)
    {
        $resume->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyResume $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyResume $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Resume::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
