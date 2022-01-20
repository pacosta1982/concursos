<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkExperience\BulkDestroyWorkExperience;
use App\Http\Requests\Admin\WorkExperience\DestroyWorkExperience;
use App\Http\Requests\Admin\WorkExperience\IndexWorkExperience;
use App\Http\Requests\Admin\WorkExperience\StoreWorkExperience;
use App\Http\Requests\Admin\WorkExperience\UpdateWorkExperience;
use App\Models\WorkExperience;
use App\Models\Resume;
use App\Models\EndReason;
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
use Illuminate\Support\Facades\Auth;

class WorkExperienceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexWorkExperience $request
     * @return array|Factory|View
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(IndexWorkExperience $request)
    {

        $resume = Resume::where('created_by', Auth::user()->id)->first();
        if ($resume) {
            $resumeid = $resume->id;
        } else {
            $resumeid = '0';
        }
        // create and AdminListing instance for a specific model and
        $datawork = AdminListing::create(WorkExperience::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'resume_id', 'company', 'position', 'start', 'end', 'end_reason_id', 'tasks', 'contact'],

            // set columns to searchIn
            ['id', 'company', 'position', 'tasks', 'contact'],
            function ($query) use ($resumeid) {
                $query
                    ->where('work_experience.resume_id', '=', $resumeid);
                //->orderBy('requirements.requirement_type_id');
            }
        );

        if ($request->ajax()) {
            return ['datawork' => $datawork];
        }

        //return view('admin.work-experience.index', ['datawork' => $datawork]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(Resume $resume)
    {
        //$this->authorize('admin.work-experience.create');
        $end_reason = EndReason::all();
        return view('applicant.resume.work-experience.create', compact('resume', 'end_reason'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWorkExperience $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreWorkExperience $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['end_reason_id'] = $request->getEndReasonId();
        // Store the WorkExperience
        $workExperience = WorkExperience::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('resume'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('resume');
    }

    /**
     * Display the specified resource.
     *
     * @param WorkExperience $workExperience
     * @throws AuthorizationException
     * @return void
     */
    public function show(WorkExperience $workExperience)
    {
        $this->authorize('admin.work-experience.show', $workExperience);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WorkExperience $workExperience
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(WorkExperience $workExperience)
    {
        $this->authorize('admin.work-experience.edit', $workExperience);


        return view('admin.work-experience.edit', [
            'workExperience' => $workExperience,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWorkExperience $request
     * @param WorkExperience $workExperience
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateWorkExperience $request, WorkExperience $workExperience)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values WorkExperience
        $workExperience->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/work-experiences'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/work-experiences');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyWorkExperience $request
     * @param WorkExperience $workExperience
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyWorkExperience $request, WorkExperience $workExperience)
    {
        $workExperience->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyWorkExperience $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyWorkExperience $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    WorkExperience::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
