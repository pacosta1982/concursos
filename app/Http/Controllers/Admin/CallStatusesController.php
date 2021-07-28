<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CallStatus\BulkDestroyCallStatus;
use App\Http\Requests\Admin\CallStatus\DestroyCallStatus;
use App\Http\Requests\Admin\CallStatus\IndexCallStatus;
use App\Http\Requests\Admin\CallStatus\StoreCallStatus;
use App\Http\Requests\Admin\CallStatus\UpdateCallStatus;
use App\Models\CallStatus;
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

class CallStatusesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCallStatus $request
     * @return array|Factory|View
     */
    public function index(IndexCallStatus $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CallStatus::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'call_id', 'status_id', 'user', 'user_model', 'description'],

            // set columns to searchIn
            ['id', 'user', 'user_model', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.call-status.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.call-status.create');

        return view('admin.call-status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCallStatus $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCallStatus $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CallStatus
        $callStatus = CallStatus::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/call-statuses'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/call-statuses');
    }

    /**
     * Display the specified resource.
     *
     * @param CallStatus $callStatus
     * @throws AuthorizationException
     * @return void
     */
    public function show(CallStatus $callStatus)
    {
        $this->authorize('admin.call-status.show', $callStatus);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CallStatus $callStatus
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CallStatus $callStatus)
    {
        $this->authorize('admin.call-status.edit', $callStatus);


        return view('admin.call-status.edit', [
            'callStatus' => $callStatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCallStatus $request
     * @param CallStatus $callStatus
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCallStatus $request, CallStatus $callStatus)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CallStatus
        $callStatus->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/call-statuses'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/call-statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCallStatus $request
     * @param CallStatus $callStatus
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCallStatus $request, CallStatus $callStatus)
    {
        $callStatus->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCallStatus $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCallStatus $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CallStatus::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
