<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AcademicState\BulkDestroyAcademicState;
use App\Http\Requests\Admin\AcademicState\DestroyAcademicState;
use App\Http\Requests\Admin\AcademicState\IndexAcademicState;
use App\Http\Requests\Admin\AcademicState\StoreAcademicState;
use App\Http\Requests\Admin\AcademicState\UpdateAcademicState;
use App\Models\AcademicState;
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

class AcademicStatesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAcademicState $request
     * @return array|Factory|View
     */
    public function index(IndexAcademicState $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AcademicState::class)->processRequestAndGet(
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

        return view('admin.academic-state.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.academic-state.create');

        return view('admin.academic-state.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAcademicState $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAcademicState $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the AcademicState
        $academicState = AcademicState::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/academic-states'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/academic-states');
    }

    /**
     * Display the specified resource.
     *
     * @param AcademicState $academicState
     * @throws AuthorizationException
     * @return void
     */
    public function show(AcademicState $academicState)
    {
        $this->authorize('admin.academic-state.show', $academicState);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AcademicState $academicState
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(AcademicState $academicState)
    {
        $this->authorize('admin.academic-state.edit', $academicState);


        return view('admin.academic-state.edit', [
            'academicState' => $academicState,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAcademicState $request
     * @param AcademicState $academicState
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAcademicState $request, AcademicState $academicState)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values AcademicState
        $academicState->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/academic-states'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/academic-states');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAcademicState $request
     * @param AcademicState $academicState
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAcademicState $request, AcademicState $academicState)
    {
        $academicState->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAcademicState $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAcademicState $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    AcademicState::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
