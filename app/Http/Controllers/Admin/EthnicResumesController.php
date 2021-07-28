<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EthnicResume\BulkDestroyEthnicResume;
use App\Http\Requests\Admin\EthnicResume\DestroyEthnicResume;
use App\Http\Requests\Admin\EthnicResume\IndexEthnicResume;
use App\Http\Requests\Admin\EthnicResume\StoreEthnicResume;
use App\Http\Requests\Admin\EthnicResume\UpdateEthnicResume;
use App\Models\EthnicResume;
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

class EthnicResumesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEthnicResume $request
     * @return array|Factory|View
     */
    public function index(IndexEthnicResume $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(EthnicResume::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'resume_id', 'name', 'zone', 'registered'],

            // set columns to searchIn
            ['id', 'name', 'zone']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.ethnic-resume.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ethnic-resume.create');

        return view('admin.ethnic-resume.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEthnicResume $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEthnicResume $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the EthnicResume
        $ethnicResume = EthnicResume::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ethnic-resumes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ethnic-resumes');
    }

    /**
     * Display the specified resource.
     *
     * @param EthnicResume $ethnicResume
     * @throws AuthorizationException
     * @return void
     */
    public function show(EthnicResume $ethnicResume)
    {
        $this->authorize('admin.ethnic-resume.show', $ethnicResume);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EthnicResume $ethnicResume
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(EthnicResume $ethnicResume)
    {
        $this->authorize('admin.ethnic-resume.edit', $ethnicResume);


        return view('admin.ethnic-resume.edit', [
            'ethnicResume' => $ethnicResume,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEthnicResume $request
     * @param EthnicResume $ethnicResume
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEthnicResume $request, EthnicResume $ethnicResume)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values EthnicResume
        $ethnicResume->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ethnic-resumes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ethnic-resumes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEthnicResume $request
     * @param EthnicResume $ethnicResume
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEthnicResume $request, EthnicResume $ethnicResume)
    {
        $ethnicResume->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEthnicResume $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEthnicResume $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    EthnicResume::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
