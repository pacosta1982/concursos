<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Call\BulkDestroyCall;
use App\Http\Requests\Admin\Call\DestroyCall;
use App\Http\Requests\Admin\Call\IndexCall;
use App\Http\Requests\Admin\Call\StoreCall;
use App\Http\Requests\Admin\Call\UpdateCall;
use App\Models\Call;
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

class CallsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCall $request
     * @return array|Factory|View
     */
    public function index(IndexCall $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Call::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'description', 'call_type_id', 'position_id', 'company_id', 'start', 'end'],

            // set columns to searchIn
            ['id', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.call.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.call.create');

        return view('admin.call.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCall $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCall $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Call
        $call = Call::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/calls'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/calls');
    }

    /**
     * Display the specified resource.
     *
     * @param Call $call
     * @throws AuthorizationException
     * @return void
     */
    public function show(Call $call)
    {
        $this->authorize('admin.call.show', $call);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Call $call
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Call $call)
    {
        $this->authorize('admin.call.edit', $call);


        return view('admin.call.edit', [
            'call' => $call,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCall $request
     * @param Call $call
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCall $request, Call $call)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Call
        $call->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/calls'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/calls');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCall $request
     * @param Call $call
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCall $request, Call $call)
    {
        $call->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCall $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCall $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Call::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
