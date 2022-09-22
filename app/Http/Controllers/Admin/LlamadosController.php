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
use App\Models\City;
use App\Models\LanguageLevelResume;
use App\Models\WorkExperience;
use App\Models\DisabilityResume;
use App\Models\EthnicResume;
use App\Models\State;
use App\Models\Call;
use Illuminate\Support\Facades\Auth;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Requests\Admin\Call\IndexCall;
use App\Models\Application;
use App\Models\Status;
use PDF;
use App\Exports\AdmitidosExport;
use App\Exports\InvoicesExport;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class LlamadosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexResume $request
     * @return array|Factory|View
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }
    */


    public function export(Call $call)
    {
        return Excel::download(new InvoicesExport($call->id), 'postulantes'.$call->Position->name.'.xlsx');
        //return Excel::download(new AdmitidosExport(2, $call->id), 'postulantes.xlsx');
    }

    public function createPDFsingle($call, $resume_id)
    {

        $resume = Resume::find($resume_id);
        //return $resume;
        $pdf = PDF::loadView('applicant.resume.pdf.resume', compact('resume'));
        return $pdf->download('CV-' . $resume->names . $resume->last_names . '.pdf');

    }

    public function exportRechazados(Call $call)
    {
        return Excel::download(new AdmitidosExport(3, $call->id), 'postulantes_no_admitidos.xlsx');
    }

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
        return view('admin.call.indexllamado', ['data' => $data]);
    }

    public function indexOld(IndexAcademicTraining $request)
    {
        $resume = Resume::where('created_by', Auth::user()->id)->first();
        if ($resume) {
            $resumeid = $resume->id;
        } else {
            $resumeid = '0';
        }
        //$resumeid = $resume->id;
        //return $resume;
        $data = AdminListing::create(AcademicTraining::class)->processRequestAndGet(
            $request,
            ['id', 'resume_id', 'education_level_id', 'academic_state_id', 'name', 'institution', 'registered','workload'],
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

        $datadisability = AdminListing::create(DisabilityResume::class)->processRequestAndGet(
            $request,
            ['id', 'resume_id', 'disability_id', 'cause', 'percent', 'certificate', 'certificate_date'],
            ['id', 'cause', 'certificate'],
            function ($query) use ($resumeid) {
                $query
                    ->where('disability_resumes.resume_id', '=', $resumeid);
                //->orderBy('requirements.requirement_type_id');
            }
        );

        if ($request->ajax()) {
            return [
                'data' => $data,
                ];
        }

        $ethnic = AdminListing::create(EthnicResume::class)->processRequestAndGet(
            $request,
            ['id', 'resume_id', 'name', 'zone', 'registered'],
            ['id', 'name', 'zone'],
            function ($query) use ($resumeid) {
                $query
                    ->where('ethnic_resumes.resume_id', '=', $resumeid);
                //->orderBy('requirements.requirement_type_id');
            }
        );




        //$datalanguage = LanguageLevelResume::where('resume_id', $resume->id)->get();

        return view('applicant.resume.index', compact('resume', 'data', 'datalanguage', 'datawork', 'datadisability', 'ethnic'));
    }


    public function createPDF()
    {

        $resume = Resume::where('created_by', Auth::user()->id)->first();
        $pdf = PDF::loadView('applicant.resume.pdf.resume', compact('resume'));
        return $pdf->download('CV-' . $resume->names . $resume->last_names . '.pdf');
        //return 'pdf';
        // retreive all records from db
        /*$data = Resume::all();

        // share data to view
        view()->share('employee', $data);
        $pdf = PDF::loadView('pdf_view', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');*/
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
        $nodep = [18, 19, 20, 999];
        $state = State::whereNotIn('DptoId', $nodep)->orderBy('DptoNom')->get();
        $city = City::all();

        return view('applicant.resume.create', compact('state', 'city'));
    }

    public function cities($dptoid)
    {
        //$nodep = [18, 19, 20, 999];
        //$state = State::whereNotIn('DptoId', $nodep)->orderBy('DptoNom')->get();
        //return $state;
        $city = City::where('CiuDptoID', $dptoid)
            ->whereNotIn('CiuId', [998, 999])
            ->get(); //->sortBy("CiuNom"); //->pluck("CiuNom", "CiuId");
        return $city;
        //return json_encode($city, JSON_FORCE_OBJECT);
        //return json_encode($city, JSON_UNESCAPED_UNICODE);
    }

    public function getIdentificaciones($id)
    {
        //$url = "http://" . env("URL_ENV", "192.168.202.43:8080") . "/mbohape-core/sii/security";
        try {
            $response = Http::timeout(2)->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ])->post("http://". env("URL_ENV", "192.168.202.43:8080") ."/mbohape-core/sii/security", [
                'username' => 'senavitatconsultas',
                'password' => 'S3n4vitat',
            ]);
            $token = $response['token'];

            try {
                $ident = Http::timeout(2)->withHeaders([
                    //'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ])->get("http://" . env("URL_ENV", "192.168.202.43:8080") . "/frontend-identificaciones/api/persona/obtenerPersonaPorCedula/" . $id);
                return response()->json([
                    'error' => false,
                    'message' => $ident['obtenerPersonaPorNroCedulaResponse']['return']
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'error' => true,
                    'message' => 'Error de Lectura de Datos'
                ]);
            }

            return $token;
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => 'Error de Autenticación'
            ]);
        }





        /*$identificaciones = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://10.1.79.7:8080/frontend-identificaciones/api/persona/obtenerPersonaPorCedula/' . $id, [
            'username' => 'senavitatconsultas',
            'password' => 'S3n4vitat',
        ]);

        return $identificaciones;*/
        /*$client = new Client();

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
        }*/
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
        $sanitized['state_id'] = $request->getStateId();
        $sanitized['city_id'] = $request->getCityId();
        $sanitized['created_by'] = Auth::user()->id;
        //dd($sanitized);
        // Store the Resume
        $resume = Resume::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('resume'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('resume');
    }


    public function show(Call $call)
    {
        //return $call;

        //$aux = Application::find(33);
        //return $aux;

        $postulantes = Application//::select( 'code', 'call_id', 'resume_id', 'resumes.names', 'resumes.last_names', 'resumes.government_id', 'resumes.email', 'resumes.birthdate')
                                    //::join('resumes', 'applications.resume_id', '=', 'resumes.id')
                                    ::where('call_id', $call->id)
                                    ->get();

                                    //$postulantes = Application::all();

        //return $postulantes;

        return view('admin.call.show', compact('postulantes', 'call'));
    }

    public function showAdmitidos(Call $call)
    {
        //return $call;

        $aux = Application::find(33);
        //return $aux;

        $postulantes = Application::where('call_id', $call->id)
                                    ->whereHas('statuses', function($q){
                                        $q->where('status_id', 2);
                                    })
                                    ->get();

                                    //$postulantes = Application::all();

        //return $postulantes;
        $title  = "POSTULANTES ADMITIDOS";
        $url = 'export';
        return view('admin.call.filtro', compact('postulantes', 'call', 'title','url'));
    }

    public function showRechazados(Call $call)
    {

        $postulantes = Application::where('call_id', $call->id)
                                    ->whereHas('statuses', function($q){
                                        $q->where('status_id', 3);
                                    })
                                    ->get();

                                    //$postulantes = Application::all();

        //return $postulantes;

        $title  = "POSTULANTES NO ADMITIDOS";
        $url = 'exportrechazados';
        return view('admin.call.filtro', compact('postulantes', 'call', 'title','url'));
    }

    public function showpostulante(Call $call, Resume $resume)
    {

        $navegacion = Status::where('id','!=', 1 )->get();
        $application = Application::where('call_id',$call->id)
                                    ->where('resume_id',$resume->id)
                                    ->first();
        return view('admin.call.showpostulante', compact('resume', 'call','navegacion','application'));
    }

    public function transition(Call $call, Resume $resume, Status $status)
    {
        //return $resume->id;
        $user = Auth::user()->id;
        $application = Application::where('call_id',$call->id)
                                    ->where('resume_id',$resume->id)
                                    ->first();
        $appid =  $application->id;
        //return $appid;
        return view('admin.call.transition', compact('user','resume','status','appid'));
    }

    /**
     * Display the specified resource.
     *
     * @param Resume $resume
     * @throws AuthorizationException
     * @return void
     */
    public function showold(Call $call)
    {
        //$this->authorize('admin.resume.show', $resume);

        //return 'hola';

        //$call = Call::select();

        //return $call;
        $aplications = Application::select('calls.description', 'code', 'call_id')
        ->join('calls', 'applications.call_id', '=', 'calls.id')
        ->get();

        $estados = $aplications->groupBy('description')->map(function ($aplications) {
            return $aplications->count();
        });


        $labels_estados = array_keys($estados->toArray());
        $count_estados = array_values($estados->toArray());

        //return $estados;
        /*$resume = Resume::where('created_by', Auth::user()->id)->first();
        if ($resume) {
            $authID = $resume->id;
        } else {
            $authID = '0';
        }*/

        //$app = Application::where('resume_id', $authID)->get();

        /*$chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Total Postulaciones', 'Llamados'])
            ->datasets([
                [
                    "label" => "Total Postulaciones",
                    'backgroundColor' => ['#001C54', '#BA3A3B'],
                    'hoverBackgroundColor' => ['#001C54', '#BA3A3B'],
                    'data' => [$aplications->count(), $call->count()], //$arr,
                ]

            ])

            ->optionsRaw("{
            legend: {
                display:true,
                position: 'bottom',
                labels: {
                    fontColor:  '#000'
                }
            },
            plugins: {
                labels: {
                    render: 'value'
                },
            },
            scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
        }");*/

        $chartjs = app()->chartjs
            ->name('lineChartTest2')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels_estados)
            ->datasets([
                [
                    "label" => "My First dataset",
                    'backgroundColor' => ['#F6F454', '#1FDC61'],
                    'hoverBackgroundColor' => ['#F6F454', '#1FDC61'],
                    /*'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",*/
                    'data' => $count_estados,
                ],

            ])
            ->options([]);

        return view('admin.call.show', compact('chartjs','estados'));
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

        $nodep = [18, 19, 20, 999];
        $state = State::whereNotIn('DptoId', $nodep)->orderBy('DptoNom')->get();
        $city = City::all();

        return view('applicant.resume.edit', [
            'resume' => $resume,
            'state' => $state,
            'city' => $city
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
        $sanitized['state_id'] = $request->getStateId();
        $sanitized['city_id'] = $request->getCityId();

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
