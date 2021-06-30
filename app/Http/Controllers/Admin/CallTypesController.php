<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CallType\BulkDestroyCallType;
use App\Http\Requests\Admin\CallType\DestroyCallType;
use App\Http\Requests\Admin\CallType\IndexCallType;
use App\Http\Requests\Admin\CallType\StoreCallType;
use App\Http\Requests\Admin\CallType\UpdateCallType;
use App\Models\CallType;
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

class CallTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCallType $request
     * @return array|Factory|View
     */
    public function index(IndexCallType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CallType::class)->processRequestAndGet(
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

        return view('admin.call-type.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.call-type.create');

        return view('admin.call-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCallType $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCallType $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CallType
        $callType = CallType::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/call-types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/call-types');
    }

    /**
     * Display the specified resource.
     *
     * @param CallType $callType
     * @throws AuthorizationException
     * @return void
     */
    public function show(CallType $callType)
    {
        $this->authorize('admin.call-type.show', $callType);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CallType $callType
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CallType $callType)
    {
        $this->authorize('admin.call-type.edit', $callType);


        return view('admin.call-type.edit', [
            'callType' => $callType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCallType $request
     * @param CallType $callType
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCallType $request, CallType $callType)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CallType
        $callType->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/call-types'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/call-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCallType $request
     * @param CallType $callType
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCallType $request, CallType $callType)
    {
        $callType->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCallType $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCallType $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CallType::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
