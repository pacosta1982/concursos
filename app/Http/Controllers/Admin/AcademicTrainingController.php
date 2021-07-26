<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AcademicTraining\BulkDestroyAcademicTraining;
use App\Http\Requests\Admin\AcademicTraining\DestroyAcademicTraining;
use App\Http\Requests\Admin\AcademicTraining\IndexAcademicTraining;
use App\Http\Requests\Admin\AcademicTraining\StoreAcademicTraining;
use App\Http\Requests\Admin\AcademicTraining\UpdateAcademicTraining;
use App\Models\AcademicTraining;
use App\Models\Resume;
use App\Models\AcademicState;
use App\Models\EducationLevel;
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

class AcademicTrainingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAcademicTraining $request
     * @return array|Factory|View
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(IndexAcademicTraining $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AcademicTraining::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'resume_id', 'education_level_id', 'academic_state_id', 'name', 'institution', 'registered'],

            // set columns to searchIn
            ['id', 'name', 'institution']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.academic-training.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(Resume $resume)
    {
        //$this->authorize('admin.academic-training.create');
        //dd($resume);
        $education_level = EducationLevel::all();
        $academic_state = AcademicState::all();

        return view('applicant.resume.academic-training.create', compact('education_level', 'academic_state', 'resume'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAcademicTraining $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAcademicTraining $request)
    {
        // Sanitize input

        $sanitized = $request->getSanitized();
        $sanitized['education_level_id'] = $request->getEducationLevelId();
        $sanitized['academic_state_id'] = $request->getAcademicStateId();
        //dd($sanitized['resume_id']);
        // Store the AcademicTraining
        $academicTraining = AcademicTraining::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('resume'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('resume');
    }

    /**
     * Display the specified resource.
     *
     * @param AcademicTraining $academicTraining
     * @throws AuthorizationException
     * @return void
     */
    public function show(AcademicTraining $academicTraining)
    {
        $this->authorize('admin.academic-training.show', $academicTraining);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AcademicTraining $academicTraining
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(AcademicTraining $academicTraining)
    {
        $this->authorize('admin.academic-training.edit', $academicTraining);


        return view('admin.academic-training.edit', [
            'academicTraining' => $academicTraining,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAcademicTraining $request
     * @param AcademicTraining $academicTraining
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAcademicTraining $request, AcademicTraining $academicTraining)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values AcademicTraining
        $academicTraining->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/academic-trainings'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/academic-trainings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAcademicTraining $request
     * @param AcademicTraining $academicTraining
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAcademicTraining $request, AcademicTraining $academicTraining)
    {
        $academicTraining->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAcademicTraining $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAcademicTraining $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    AcademicTraining::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
