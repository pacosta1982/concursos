<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RequirementType\BulkDestroyRequirementType;
use App\Http\Requests\Admin\RequirementType\DestroyRequirementType;
use App\Http\Requests\Admin\RequirementType\IndexRequirementType;
use App\Http\Requests\Admin\RequirementType\StoreRequirementType;
use App\Http\Requests\Admin\RequirementType\UpdateRequirementType;
use App\Models\RequirementType;
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

class RequirementTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRequirementType $request
     * @return array|Factory|View
     */
    public function index(IndexRequirementType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(RequirementType::class)->processRequestAndGet(
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

        return view('admin.requirement-type.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.requirement-type.create');

        return view('admin.requirement-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequirementType $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRequirementType $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the RequirementType
        $requirementType = RequirementType::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/requirement-types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/requirement-types');
    }

    /**
     * Display the specified resource.
     *
     * @param RequirementType $requirementType
     * @throws AuthorizationException
     * @return void
     */
    public function show(RequirementType $requirementType)
    {
        $this->authorize('admin.requirement-type.show', $requirementType);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RequirementType $requirementType
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(RequirementType $requirementType)
    {
        $this->authorize('admin.requirement-type.edit', $requirementType);


        return view('admin.requirement-type.edit', [
            'requirementType' => $requirementType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequirementType $request
     * @param RequirementType $requirementType
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRequirementType $request, RequirementType $requirementType)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values RequirementType
        $requirementType->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/requirement-types'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/requirement-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRequirementType $request
     * @param RequirementType $requirementType
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRequirementType $request, RequirementType $requirementType)
    {
        $requirementType->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRequirementType $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRequirementType $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    RequirementType::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
