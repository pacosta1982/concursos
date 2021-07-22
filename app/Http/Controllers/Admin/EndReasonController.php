<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EndReason\BulkDestroyEndReason;
use App\Http\Requests\Admin\EndReason\DestroyEndReason;
use App\Http\Requests\Admin\EndReason\IndexEndReason;
use App\Http\Requests\Admin\EndReason\StoreEndReason;
use App\Http\Requests\Admin\EndReason\UpdateEndReason;
use App\Models\EndReason;
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

class EndReasonController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEndReason $request
     * @return array|Factory|View
     */
    public function index(IndexEndReason $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(EndReason::class)->processRequestAndGet(
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

        return view('admin.end-reason.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.end-reason.create');

        return view('admin.end-reason.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEndReason $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEndReason $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the EndReason
        $endReason = EndReason::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/end-reasons'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/end-reasons');
    }

    /**
     * Display the specified resource.
     *
     * @param EndReason $endReason
     * @throws AuthorizationException
     * @return void
     */
    public function show(EndReason $endReason)
    {
        $this->authorize('admin.end-reason.show', $endReason);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EndReason $endReason
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(EndReason $endReason)
    {
        $this->authorize('admin.end-reason.edit', $endReason);


        return view('admin.end-reason.edit', [
            'endReason' => $endReason,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEndReason $request
     * @param EndReason $endReason
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEndReason $request, EndReason $endReason)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values EndReason
        $endReason->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/end-reasons'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/end-reasons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEndReason $request
     * @param EndReason $endReason
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEndReason $request, EndReason $endReason)
    {
        $endReason->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEndReason $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEndReason $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    EndReason::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
