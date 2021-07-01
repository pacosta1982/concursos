<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageLevel\BulkDestroyLanguageLevel;
use App\Http\Requests\Admin\LanguageLevel\DestroyLanguageLevel;
use App\Http\Requests\Admin\LanguageLevel\IndexLanguageLevel;
use App\Http\Requests\Admin\LanguageLevel\StoreLanguageLevel;
use App\Http\Requests\Admin\LanguageLevel\UpdateLanguageLevel;
use App\Models\LanguageLevel;
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

class LanguageLevelsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLanguageLevel $request
     * @return array|Factory|View
     */
    public function index(IndexLanguageLevel $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(LanguageLevel::class)->processRequestAndGet(
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

        return view('admin.language-level.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.language-level.create');

        return view('admin.language-level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLanguageLevel $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLanguageLevel $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the LanguageLevel
        $languageLevel = LanguageLevel::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/language-levels'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/language-levels');
    }

    /**
     * Display the specified resource.
     *
     * @param LanguageLevel $languageLevel
     * @throws AuthorizationException
     * @return void
     */
    public function show(LanguageLevel $languageLevel)
    {
        $this->authorize('admin.language-level.show', $languageLevel);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LanguageLevel $languageLevel
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(LanguageLevel $languageLevel)
    {
        $this->authorize('admin.language-level.edit', $languageLevel);


        return view('admin.language-level.edit', [
            'languageLevel' => $languageLevel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLanguageLevel $request
     * @param LanguageLevel $languageLevel
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLanguageLevel $request, LanguageLevel $languageLevel)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values LanguageLevel
        $languageLevel->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/language-levels'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/language-levels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLanguageLevel $request
     * @param LanguageLevel $languageLevel
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLanguageLevel $request, LanguageLevel $languageLevel)
    {
        $languageLevel->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLanguageLevel $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLanguageLevel $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    LanguageLevel::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
