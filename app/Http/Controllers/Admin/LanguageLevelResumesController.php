<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageLevelResume\BulkDestroyLanguageLevelResume;
use App\Http\Requests\Admin\LanguageLevelResume\DestroyLanguageLevelResume;
use App\Http\Requests\Admin\LanguageLevelResume\IndexLanguageLevelResume;
use App\Http\Requests\Admin\LanguageLevelResume\StoreLanguageLevelResume;
use App\Http\Requests\Admin\LanguageLevelResume\UpdateLanguageLevelResume;
use App\Models\LanguageLevelResume;
use App\Models\Language;
use App\Models\LanguageLevel;
use App\Models\Resume;
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

class LanguageLevelResumesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLanguageLevelResume $request
     * @return array|Factory|View
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(IndexLanguageLevelResume $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(LanguageLevelResume::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'resume_id', 'language_id', 'language_level_id', 'certificate'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.language-level-resume.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(Resume $resume)
    {
        //$this->authorize('admin.language-level-resume.create');
        $language = Language::all();
        $language_level = LanguageLevel::all();
        return view('applicant.resume.language-level-resume.create', compact('language', 'language_level', 'resume'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLanguageLevelResume $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLanguageLevelResume $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['language_id'] = $request->getLanguageId();
        $sanitized['language_level_id'] = $request->getLanguageLevelId();
        // Store the LanguageLevelResume
        $languageLevelResume = LanguageLevelResume::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('resume'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('resume');
    }

    /**
     * Display the specified resource.
     *
     * @param LanguageLevelResume $languageLevelResume
     * @throws AuthorizationException
     * @return void
     */
    public function show(LanguageLevelResume $languageLevelResume)
    {
        $this->authorize('admin.language-level-resume.show', $languageLevelResume);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LanguageLevelResume $languageLevelResume
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(LanguageLevelResume $languageLevelResume)
    {
        $this->authorize('admin.language-level-resume.edit', $languageLevelResume);


        return view('admin.language-level-resume.edit', [
            'languageLevelResume' => $languageLevelResume,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLanguageLevelResume $request
     * @param LanguageLevelResume $languageLevelResume
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLanguageLevelResume $request, LanguageLevelResume $languageLevelResume)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values LanguageLevelResume
        $languageLevelResume->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/language-level-resumes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/language-level-resumes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLanguageLevelResume $request
     * @param LanguageLevelResume $languageLevelResume
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLanguageLevelResume $request, LanguageLevelResume $languageLevelResume)
    {
        $languageLevelResume->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLanguageLevelResume $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLanguageLevelResume $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    LanguageLevelResume::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
