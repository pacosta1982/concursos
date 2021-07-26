<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resume\BulkDestroyResume;
use App\Http\Requests\Admin\Resume\DestroyResume;
use App\Http\Requests\Admin\Resume\IndexResume;
use App\Http\Requests\Admin\Resume\StoreResume;
use App\Http\Requests\Admin\Resume\UpdateResume;
use App\Http\Requests\Admin\AcademicTraining\DestroyAcademicTraining;
use App\Http\Requests\Admin\AcademicTraining\IndexAcademicTraining;
use App\Models\Resume;
use App\Models\AcademicTraining;
use App\Models\LanguageLevelResume;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\Auth;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ResumesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexResume $request
     * @return array|Factory|View
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(IndexAcademicTraining $request)
    {
        $resume = Resume::where('created_by', Auth::user()->id)->first();
        $resumeid = $resume->id;

        $data = AdminListing::create(AcademicTraining::class)->processRequestAndGet(
            $request,
            ['id', 'resume_id', 'education_level_id', 'academic_state_id', 'name', 'institution', 'registered'],
            ['id', 'name', 'institution'],
            function ($query) use ($resumeid) {
                $query
                    ->where('academic_training.resume_id', '=', $resumeid);
                //->orderBy('requirements.requirement_type_id');
            }
        );

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


        $datalanguage = AdminListing::create(LanguageLevelResume::class)->processRequestAndGet(
            $request,
            ['id', 'resume_id', 'language_id', 'language_level_id', 'certificate'],
            ['id'],
            function ($query) use ($resumeid) {
                $query
                    ->where('language_level_resumes.resume_id', '=', $resumeid);
                //->orderBy('requirements.requirement_type_id');
            }
        );




        //$datalanguage = LanguageLevelResume::where('resume_id', $resume->id)->get();

        return view('applicant.resume.index', compact('resume', 'data', 'datalanguage', 'datawork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        //$this->authorize('admin.resume.create');

        return view('applicant.resume.create');
    }

    public function getIdentificaciones($id)
    {
        //return "abc";
        $client = new Client();

        try {
            $url = "http://" . env("URL_ENV", "192.168.202.43:8080") . "/mbohape-core/sii/security";
            $res = $client->request('POST', $url, [
                'connect_timeout' => 10,
                'http_errors' => true,
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
                'json' => [
                    'username' => 'senavitatconsultas',
                    'password' => 'S3n4vitat'
                ],
            ]);
            //return $res;
            //dd($res);
            if ($res->getStatusCode() == 200) {
                $json = json_decode($res->getBody(), true);
                $token = $json['token'];

                $url = "http://" . env("URL_ENV", "192.168.202.43:8080") . '/frontend-identificaciones/api/persona/obtenerPersonaPorCedula/' . $id;
                $res = $client->request('GET', $url, [
                    'connect_timeout' => 10,
                    'http_errors' => true,
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ],
                ]);

                if ($res->getStatusCode() == 200) {
                    $json = json_decode($res->getBody(), true);
                    return response()->json([
                        'error' => false,
                        'message' => $json['obtenerPersonaPorNroCedulaResponse']['return']
                    ]);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Error de comunicación en Consulta'
                    ]);
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Error de Autenticación'
                ]);
            }
        } catch (\Exception $exception) {
            //dd($exception);
            return response()->json([
                'error' => true,
                'message' => 'Error de comunicación'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreResume $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreResume $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Resume
        $resume = Resume::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('resume'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('resume');
    }

    /**
     * Display the specified resource.
     *
     * @param Resume $resume
     * @throws AuthorizationException
     * @return void
     */
    public function show(Resume $resume)
    {
        $this->authorize('admin.resume.show', $resume);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Resume $resume
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Resume $resume)
    {
        //$this->authorize('admin.resume.edit', $resume);
        //dd($resume);

        return view('applicant.resume.edit', [
            'resume' => $resume,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateResume $request
     * @param Resume $resume
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateResume $request, Resume $resume)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Resume
        $resume->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('resume'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('resume');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyResume $request
     * @param Resume $resume
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyResume $request, Resume $resume)
    {
        $resume->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyResume $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyResume $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Resume::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
