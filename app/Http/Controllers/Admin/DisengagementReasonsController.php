<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DisengagementReason\BulkDestroyDisengagementReason;
use App\Http\Requests\Admin\DisengagementReason\DestroyDisengagementReason;
use App\Http\Requests\Admin\DisengagementReason\IndexDisengagementReason;
use App\Http\Requests\Admin\DisengagementReason\StoreDisengagementReason;
use App\Http\Requests\Admin\DisengagementReason\UpdateDisengagementReason;
use App\Models\DisengagementReason;
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

class DisengagementReasonsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDisengagementReason $request
     * @return array|Factory|View
     */
    public function index(IndexDisengagementReason $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(DisengagementReason::class)->processRequestAndGet(
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

        return view('admin.disengagement-reason.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.disengagement-reason.create');

        return view('admin.disengagement-reason.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDisengagementReason $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDisengagementReason $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the DisengagementReason
        $disengagementReason = DisengagementReason::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/disengagement-reasons'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/disengagement-reasons');
    }

    /**
     * Display the specified resource.
     *
     * @param DisengagementReason $disengagementReason
     * @throws AuthorizationException
     * @return void
     */
    public function show(DisengagementReason $disengagementReason)
    {
        $this->authorize('admin.disengagement-reason.show', $disengagementReason);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DisengagementReason $disengagementReason
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(DisengagementReason $disengagementReason)
    {
        $this->authorize('admin.disengagement-reason.edit', $disengagementReason);


        return view('admin.disengagement-reason.edit', [
            'disengagementReason' => $disengagementReason,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDisengagementReason $request
     * @param DisengagementReason $disengagementReason
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDisengagementReason $request, DisengagementReason $disengagementReason)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values DisengagementReason
        $disengagementReason->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/disengagement-reasons'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/disengagement-reasons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDisengagementReason $request
     * @param DisengagementReason $disengagementReason
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDisengagementReason $request, DisengagementReason $disengagementReason)
    {
        $disengagementReason->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDisengagementReason $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDisengagementReason $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DisengagementReason::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
