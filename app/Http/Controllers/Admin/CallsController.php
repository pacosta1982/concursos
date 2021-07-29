<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Call\BulkDestroyCall;
use App\Http\Requests\Admin\Call\DestroyCall;
use App\Http\Requests\Admin\Call\IndexCall;
use App\Http\Requests\Admin\Call\StoreCall;
use App\Http\Requests\Admin\Call\UpdateCall;
use App\Models\Call;
use App\Models\CallType;
use App\Models\Position;
use App\Models\Company;
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
        //dd($data);
        //return $data;
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
        $tipo_llamado = CallType::all();
        $cargo = Position::all();
        $institucion = Company::all();

        return view('admin.call.create', compact('tipo_llamado', 'cargo', 'institucion'));
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
        //dd($request);
        $sanitized = $request->getSanitized();

        $sanitized['call_type_id'] = $request->getCallTypeId();
        $sanitized['position_id'] = $request->getPositionId();
        $sanitized['company_id'] = $request->getCompanyId();

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
        //$this->authorize('admin.call.show', $call);
        //return $call;
        //return $mediaItems = $call->getMedia('gallery');
        return view('applicant.calls.show', compact('call'));
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
        $tipo_llamado = CallType::all();
        $cargo = Position::all();
        $institucion = Company::all();

        return view('admin.call.edit', [
            'call' => $call,
            'tipo_llamado' => $tipo_llamado,
            'cargo' => $cargo,
            'institucion' => $institucion,
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
        $sanitized['call_type_id'] = $request->getCallTypeId();
        $sanitized['position_id'] = $request->getPositionId();
        $sanitized['company_id'] = $request->getCompanyId();
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
    public function bulkDestroy(BulkDestroyCall $request): Response
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
