<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant;
use App\Models\Application;
use App\Models\Call;
use App\Models\Resume;
use App\Models\City;
use App\Models\MediaDocument;
use App\Models\EducationLevel;
use App\Models\DocumentType;
use App\Models\ApplicantDocument;
use App\Models\ApplicantStatus;
use App\Models\ContactMethod;
use App\Models\ApplicantContactMethod;
use App\Http\Requests\StoreApplicantUser;
use App\Http\Requests\StoreApplicantUserDocument;
use App\Http\Requests\StoreApplicantUserConyuge;
use App\Http\Requests\UpdateApplicantUserConyuge;
use App\Http\Requests\UpdateApplicantUser;
use Illuminate\Support\Facades\Storage;

use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;


use Brackets\AdminListing\Facades\AdminListing;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $call = Call::all();
        $resume = Resume::where('created_by', Auth::user()->id)->first();
        if ($resume) {
            $authID = $resume->id;
        } else {
            $authID = '0';
        }

        $app = Application::where('resume_id', $authID)->get();

        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Mis Postulaciones', 'Llamados'])
            ->datasets([
                [
                    "label" => "Postulaciones por Llamados",
                    'backgroundColor' => ['#001C54', '#BA3A3B'],
                    'hoverBackgroundColor' => ['#001C54', '#BA3A3B'],
                    'data' => [$app->count(), $call->count()], //$arr,
                ]

            ])
            //->options([]);
            /*->optionsRaw("{
            legend: {
                display:true,
                position: 'bottom',
                labels: {
                    fontColor:  '#000'
                }
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display:false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display:true
                    }
                }]
            },
            plugins: {
                labels: {
                    render: 'value'
                },
            }
        }");*/
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
        }");

        $chartjs2 = app()->chartjs
            ->name('lineChartTest2')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Mis Postulaciones', 'Llamados'])
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
                    'data' => [$app->count(), $call->count()],
                ],

            ])
            ->options([]);
        //dd($chartjs);
        //return $chartjs;

        return view('applicant.reports.index', compact('chartjs', 'chartjs2'));
    }

    public function homeCalls(Request $request)
    {

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
        $user = Auth::user();

        return view('applicant.calls.index', compact('user', 'data'));
    }

    public function getDocuments(Request $request)
    {

        $applicant = Applicant::where('created_by', Auth::user()->id)
            ->where('parent_applicant', null)
            ->first();
        $applicantID = $applicant->id;
        $techDocuments = AdminListing::create(ApplicantDocument::class)->processRequestAndGet(
            $request,
            ['applicant_documents.id', 'document_types.name', 'received_at'],
            ['applicant_documents.id', 'document_types.name'],
            function ($query) use ($applicantID) {
                $query
                    ->leftJoin('document_types', 'document_types.id', '=', 'applicant_documents.document_id')
                    ->where('applicant_documents.applicant_id', '=', $applicantID);
                //->where('document_types.type', '=', $documentType);
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $techDocuments->pluck('id')
                ];
            }
            return ['data' => $techDocuments];
        }
    }


    public function create()
    {
        $cities = City::whereNotIn('id', [160, 176, 163, 164, 165, 170, 175, 177, 178])
            ->orderBy('name')
            ->get();
        //dd($cities);
        //array_push($used, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24);
        $educationlevels = EducationLevel::all();
        //$contactmethods = ContactMethod::all();
        return view('create', compact('cities', 'educationlevels'));
    }

    public function store(StoreApplicantUser $request)
    {


        $sanitized = $request->getSanitized();

        $sanitized['city_id'] = $request->getCityId();
        $sanitized['education_level'] = $request->getEducationLevelId();
        $sanitized['created_by'] = Auth::user()->id;
        $sanitized['state_id'] = 11;
        $celular = $request['phone'];
        //$contactmethods = $sanitized['contactcomponents'];
        //dd($celular);

        //dd($sanitized);

        $applicant = Applicant::create($sanitized);

        if ($applicant) {
            /*try {
                foreach ($contactmethods as $contactmethod) {
                    if (!is_null($contactmethod['id']) && !is_null($contactmethod['description']) && strlen($contactmethod['description']) > 0) {
                        ApplicantContactMethod::create(['applicant_id' => $applicant->id, 'contact_method_id' => $contactmethod['id']['id'], 'description' => $contactmethod['description']]);
                    }
                }
            } catch (\Exception $exception) {
                dd($exception->getMessage());
            }*/

            ApplicantContactMethod::create([
                'applicant_id' => $applicant->id,
                'contact_method_id' => 3,
                'description' => $celular
            ]);

            ApplicantStatus::create([
                'applicant_id' => $applicant->id,
                'user_id' => Auth::user()->id,
                'status_id' => 1
            ]);
        }

        if ($request->ajax()) {
            return ['redirect' => url('home/'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('home');
    }

    public function createconyuge()
    {
        $cities = City::all();
        $educationlevels = EducationLevel::all();
        return view('createconyuge', compact('cities', 'educationlevels'));
    }

    public function storeconyuge(StoreApplicantUserConyuge $request)
    {

        $applicant = Applicant::where('created_by', Auth::user()->id)->first();
        $applicantID = $applicant->id;

        $sanitized = $request->getSanitized();
        //$sanitized['city_id'] = $request->getCityId();
        $sanitized['education_level'] = $request->getEducationLevelId();
        $sanitized['created_by'] = Auth::user()->id;
        $sanitized['parent_applicant'] = $applicantID;
        $sanitized['applicant_relationship'] = 1;
        //$sanitized['state_id'] = 11;

        $applicant = Applicant::create($sanitized);

        /*ApplicantStatus::create([
            'applicant_id' => $applicant->id,
            'user_id' => Auth::user()->id,
            'status_id' => 1
        ]);*/

        if ($request->ajax()) {
            return ['redirect' => url('home/'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('home');
    }

    public function edit(Applicant $applicant, Request $request)
    {

        //$this->authorize('admin.applicant.edit', $applicant);

        $cities = City::whereNotIn('id', [160, 176, 163, 164, 165, 170, 175, 177, 178])
            ->orderBy('name')
            ->get();
        //dd($cities);
        $educationlevels = EducationLevel::all();
        //$contactmethods = ContactMethod::all();

        $aux = [];
        foreach ($applicant->applicantContactMethods as $key => $method) {
            $aux[$key]['id'] = $method->contactMethod->toArray();
            $aux[$key]['description'] = $method->toArray()['description'];
        }
        //dd($aux);
        $savedcontactmethods = $aux;
        //dd($applicant->applicantGetCellphone->description);
        $applicant['phone'] = $applicant->applicantGetCellphone->description ? $applicant->applicantGetCellphone->description : '';
        return view('edit', [
            'applicant' => $applicant,
            'cities' => $cities,
            'educationlevels' => $educationlevels,
            //'contactmethods' => $contactmethods,
            'savedcontactmethods' => json_encode($savedcontactmethods),
        ]);
    }

    public function editconyuge(Applicant $applicant, Request $request)
    {

        //$this->authorize('admin.applicant.edit', $applicant);

        $cities = City::all();
        $educationlevels = EducationLevel::all();

        return view('editconyuge', [
            'applicant' => $applicant,
            'cities' => $cities,
            'educationlevels' => $educationlevels,

        ]);
    }

    public function update(UpdateApplicantUser $request, Applicant $applicant)
    {
        //return $request->all();

        $sanitized = $request->getSanitized();
        //dd($sanitized);
        $sanitized['city_id'] = $request->getCityId();
        $sanitized['education_level'] = $request->getEducationLevelId();
        $celular = $request['phone'];
        //$contactmethods = $sanitized['contactcomponents'];
        //dd($sanitized);

        //ApplicantContactMethod::where('applicant_id', $applicant->id)->delete();

        if ($applicant->update($sanitized)) {

            ApplicantContactMethod::where('applicant_id', $applicant->id)
                ->where('contact_method_id', 3)
                ->delete();
            ApplicantContactMethod::create([
                'applicant_id' => $applicant->id,
                'contact_method_id' => 3,
                'description' => $celular
            ]);
            /*foreach ($contactmethods as $contactmethod) {
                if (!is_null($contactmethod['id']) && !is_null($contactmethod['description']) && strlen($contactmethod['description']) > 0) {
                    ApplicantContactMethod::create(['applicant_id' => $applicant->id, 'contact_method_id' => $contactmethod['id']['id'], 'description' => $contactmethod['description']]);
                }
            }*/
        }



        if ($request->ajax()) {
            return ['redirect' => url('home'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('home');
    }


    public function updateconyuge(UpdateApplicantUserConyuge $request, Applicant $applicant)
    {
        //return $request->all();
        $sanitized = $request->getSanitized();
        $sanitized['education_level'] = $request->getEducationLevelId();
        //dd($applicant);
        $applicant->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('home'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('home');
    }


    public function documentCreate(Request $request, $id, $type)
    {

        //$this->authorize('admin.applicant-document.create');

        $applicantID = $id;

        $used = ApplicantDocument::leftJoin('document_types', 'document_types.id', '=', 'applicant_documents.document_id')
            ->where('applicant_id', '=', $applicantID)
            ->where('document_types.type', '=', $type)
            ->pluck('document_types.id')->toArray();
        array_push($used, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24);
        //dd($used);


        $documents = DocumentType::where('type', '=', $type)
            //->whereNotIn('id', '5')
            ->whereNotIn('id', $used)->get();

        return view('userapplicantdocument.create', compact('applicantID', 'documents', 'type'));
    }

    public function storeApplicantDocument(StoreApplicantUserDocument $request, $id)
    {

        //dd($request->input('document'));

        $fileNameAux = date('Y-m-d h:i:s') . '-' . $id . '-' . $request->input('document'); //. '_' . $request->file->getClientOriginalName();
        $extension = pathinfo($request->file->getClientOriginalName(), PATHINFO_EXTENSION);
        $fileName = base64_encode($fileNameAux);

        //dd($fileName . '.' . $extension);
        $applicantDocument = ApplicantDocument::create([
            'applicant_id' => $id,
            'document_id' => $request->input('document'),
            'received_at' => date('Y-m-d h:i:s')
        ]);
        $arr = array(
            'name' => $request->file->getClientOriginalName(),
            'file_name' => $request->file->getClientOriginalName(),
        );
        $arr_tojson = json_encode($arr);
        $media = MediaDocument::create([
            'model_type' => 'App\Models\ApplicantDocument',
            'model_id' => $applicantDocument->id,
            'collection_name' => 'supporting-documents',
            'name' => $fileName,
            'file_name' => $fileName . '.' . $extension,
            'mime_type' => $request->file->getMimeType(),
            'disk' => 'supporting-documents',
            'size' => $request->file->getSize(),
            'manipulations' => '[]',
            'custom_properties' => $arr_tojson,
            'responsive_images' => '[]',
            'order_column' => '1',
        ]);
        //Storage::disk('supporting-documents')->put($request->file('file'), 'supporting-documents');
        $filePath = $request->file('file')->storeAs($media->id, $fileName . '.' . $extension, 'supporting-documents');
        //dd($request);
        /*$sanitized = $request->getSanitized();
        //$fileName = time() . '_' . $sanitized->file->getClientOriginalName();
        //$filePath = $sanitized->file('file')->storeAs('uploads', $fileName, 'public');
        dd($sanitized);
        $sanitized['document_id'] = $request->getDocumentId();
        $sanitized['received_at'] = date('Y-m-d h:i:s');

        $applicantDocument = ApplicantDocument::create($sanitized);*/

        if ($request->ajax()) {
            return ['redirect' => url('home'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('home');
    }

    public function transition()
    {
        $applicant = Applicant::where('created_by', Auth::user()->id)
            ->where('parent_applicant', null)
            ->first();
        //dd($applicant);
        $applicantID = $applicant->id;
        $conyuge = Applicant::where('parent_applicant', $applicantID)
            ->where('applicant_relationship', 1)
            ->first();

        $used = ApplicantDocument::leftJoin('document_types', 'document_types.id', '=', 'applicant_documents.document_id')
            ->where('applicant_id', '=', $applicantID)
            ->where('document_types.type', '=', 'S')
            ->get();
        $contact = ApplicantContactMethod::where('applicant_id', $applicant->id)->get();
        //->pluck('document_types.id')->toArray();

        //dd($used);

        return view('transition', compact('applicant', 'conyuge', 'used', 'contact'));
    }

    public function destroy($id)
    {
        $doc = ApplicantDocument::find($id);
        if ($doc->delete()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        } else {
            return response(['message' => trans('brackets/admin-ui::admin.operation.error')]);
        }
    }

    public function storeTransition()
    {

        $applicant = Applicant::where('created_by', Auth::user()->id)
            ->where('parent_applicant', null)
            ->first();
        $conyuge = Applicant::where('parent_applicant', $applicant->id)
            ->where('applicant_relationship', 1)
            ->first();

        ApplicantStatus::create([
            'applicant_id' => $applicant->id,
            'user_id' => Auth::user()->id,
            'status_id' => 3
        ]);

        $receiver = Auth::user()->name;



        try {
            $objDemo = new \stdClass();
            $objDemo->demo_one = $applicant->names . ' ' . $applicant->last_names;
            $objDemo->demo_two = $conyuge->names . ' ' . $conyuge->last_names;
            $objDemo->sender = 'Equipo AMA';
            $objDemo->receiver = $receiver;

            //dd($objDemo);

            Mail::to(Auth::user()->email)->send(new DemoEmail($objDemo));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

        return redirect('home');
    }
}
