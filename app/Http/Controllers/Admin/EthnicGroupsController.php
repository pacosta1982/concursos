<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EthnicGroup\BulkDestroyEthnicGroup;
use App\Http\Requests\Admin\EthnicGroup\DestroyEthnicGroup;
use App\Http\Requests\Admin\EthnicGroup\IndexEthnicGroup;
use App\Http\Requests\Admin\EthnicGroup\StoreEthnicGroup;
use App\Http\Requests\Admin\EthnicGroup\UpdateEthnicGroup;
use App\Models\EthnicGroup;
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

class EthnicGroupsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEthnicGroup $request
     * @return array|Factory|View
     */
    public function index(IndexEthnicGroup $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(EthnicGroup::class)->processRequestAndGet(
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

        return view('admin.ethnic-group.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ethnic-group.create');

        return view('admin.ethnic-group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEthnicGroup $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEthnicGroup $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the EthnicGroup
        $ethnicGroup = EthnicGroup::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ethnic-groups'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ethnic-groups');
    }

    /**
     * Display the specified resource.
     *
     * @param EthnicGroup $ethnicGroup
     * @throws AuthorizationException
     * @return void
     */
    public function show(EthnicGroup $ethnicGroup)
    {
        $this->authorize('admin.ethnic-group.show', $ethnicGroup);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EthnicGroup $ethnicGroup
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(EthnicGroup $ethnicGroup)
    {
        $this->authorize('admin.ethnic-group.edit', $ethnicGroup);


        return view('admin.ethnic-group.edit', [
            'ethnicGroup' => $ethnicGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEthnicGroup $request
     * @param EthnicGroup $ethnicGroup
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEthnicGroup $request, EthnicGroup $ethnicGroup)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values EthnicGroup
        $ethnicGroup->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ethnic-groups'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ethnic-groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEthnicGroup $request
     * @param EthnicGroup $ethnicGroup
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEthnicGroup $request, EthnicGroup $ethnicGroup)
    {
        $ethnicGroup->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEthnicGroup $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEthnicGroup $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    EthnicGroup::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
