<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Application\BulkDestroyApplication;
use App\Http\Requests\Admin\Application\DestroyApplication;
use App\Http\Requests\Admin\Application\IndexApplication;
use App\Http\Requests\Admin\Application\StoreApplication;
use App\Http\Requests\Admin\Application\UpdateApplication;
use App\Models\Application;
use App\Models\Call;
use App\Models\ApplicationStatus;
use App\Models\Resume;
use App\Models\MediaDocument;
use Illuminate\Support\Facades\Auth;
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

class ApplicationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexApplication $request
     * @return array|Factory|View
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(IndexApplication $request)
    {
        // create and AdminListing instance for a specific model and
        $resume = Resume::where('created_by', Auth::user()->id)->first();
        if ($resume) {
            $authID = $resume->id;
        } else {
            $authID = '0';
        }

        //$aux = Application::find(226);
        //return $aux->getMedia('gallery');;

        //$authID = Auth::user()->id;
        $data = AdminListing::create(Application::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'code', 'call_id', 'resume_id', 'data'],

            // set columns to searchIn
            ['id', 'code', 'data'],
            function ($query) use ($authID) {
                $query
                    ->where('applications.resume_id', '=', $authID);
                //->orderBy('requirements.requirement_type_id');
            }
        );

        //return $data;

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('applicant.applications.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(Call $call)
    {
        //$this->authorize('admin.application.create');

        $resume = Resume::where('created_by', Auth::user()->id)->first();

        //return $resume;
        return view('applicant.applications.create', compact('call', 'resume'));
    }

    public function transition(Call $call, Resume $resume)
    {


        $app = Application::where('call_id', $call->id)
            ->where('resume_id', $resume->id)->exists();
        //dd($app);
        //->first();
        //return $call->position->acronym;

        //$number = 9879;


        //return $string;

        if (!$app) {
            # code...
            $application = new Application;
            //$application->getNextId();

            //return "hola";
            $application->code = 'test';
            $application->call_id = $call->id;
            $application->resume_id = $resume->id;
            $application->data = $resume->toJson();
            $application->save();

            $number = $application->id;
            $length = 4;
            $string = substr(str_repeat(0, $length).$number, - $length);

            $flight = Application::find($application->id);

            $flight->code = $call->position->acronym.$string;

            $flight->save();
            /*$resumejson = $resume;
            //  return $resumejson;

            $application = Application::firstOrNew(
                [
                    'call_id' => $call->id,
                    'resume_id' => $resume->id,
                    'data' => $resumejson,
                ]);
            $application->code = $call->position->acronym.'-'.$application->id;
            $application->save();*/

            $status = new ApplicationStatus;

            $status->application_id = $application->id;
            $status->status_id = 1;
            $status->user = Auth::user()->id;
            $status->user_model = 'App\Models\User';

            $status->save();
            return redirect('applications')->with('status', 'success');
        } else {

            $aux = Application::where('call_id', $call->id)
            ->where('resume_id', $resume->id)->first();
            //return $aux->id;
            $flight = Application::find($aux->id);
            $flight->data = $resume->toJson();
            $flight->save();

            return redirect('applications')->with('status', 'update');
            //return redirect('calls')->with('status', 'error');
            # code...
            //return redirect('calls')->withErrors('message', 'Selected query is deleted successfully.');
            //if ($request->ajax()) {
            //return ['redirect' => url('calls'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
            //}

            //return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);

        }






        //return $application->data;

        //$this->authorize('admin.application.create');

        //$resume = Resume::where('created_by', Auth::user()->id)->first();

        //return $resume;
        //return view('applicant.applications.create', compact('call', 'resume'));
        //return $resume;
        //return view('applicant.applications.transition', compact('resume', 'call'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreApplication $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreApplication $request)
    {


        $app = Application::where('call_id', $request->call_id)
            ->where('resume_id', $request->resume_id)->exists();
        $resume = Resume::find($request->resume_id);
        $call = Call::find($request->call_id);

        //return $request;

        if (!$app) {
            # code...
            //return 'crear';
            $application = new Application;
            $application->code = 'test';
            $application->call_id = $request->call_id;
            $application->resume_id = $request->resume_id;
            $application->data = $resume->toJson();
            $application->save();

            $number = $application->id;
            $length = 4;
            $string = substr(str_repeat(0, $length).$number, - $length);
            $flight = Application::find($application->id);
            $flight->code = $call->position->acronym.$string;
            $flight->save();

            //if ($request->filled('document')) {
                        $fileNameAux = date('Y-m-d h:i:s') . '-' . $number . '-' . $request->input('document'); //. '_' . $request->file->getClientOriginalName();
                        $extension = pathinfo($request->file->getClientOriginalName(), PATHINFO_EXTENSION);
                        $fileName = base64_encode($fileNameAux);

                        $arr = array(
                            'name' => $request->file->getClientOriginalName(),
                            'file_name' => $request->file->getClientOriginalName(),
                        );
                        $arr_tojson = json_encode($arr);

                        $media = MediaDocument::create([
                            'model_type' => 'App\Models\Application',
                            'model_id' => $application->id,
                            'collection_name' => 'gallery',
                            'name' => $fileName,
                            'file_name' => $fileName . '.' . $extension,
                            'mime_type' => $request->file->getMimeType(),
                            'disk' => 'gallery',
                            'size' => $request->file->getSize(),
                            'manipulations' => '[]',
                            'custom_properties' => $arr_tojson,
                            'generated_conversions' => '[]',
                            'responsive_images' => '[]',
                            'order_column' => '1',
                        ]);
                        //Storage::disk('supporting-documents')->put($request->file('file'), 'supporting-documents');
                        $filePath = $request->file('file')->storeAs($media->id, $fileName . '.' . $extension, 'gallery');
            //}



            $status = new ApplicationStatus;

            $status->application_id = $application->id;
            $status->status_id = 1;
            $status->user = Auth::user()->id;
            $status->user_model = 'App\Models\User';

            $status->save();

            return redirect('applications')->with('status', 'success');

        }else{
            return redirect('calls')->with('status', 'error');
            //return "editar";

            /*$application = Application::where('call_id', $request->call_id)
            ->where('resume_id', $request->resume_id)->first();

            //return $application;

            //$number = $application->id;
            //return $aux->id;
            $flight = Application::find($application->id);
            $flight->data = $resume->toJson();
            $flight->save();

            //return $flight;


            return redirect('applications')->with('status', 'update');*/
        }

        /*$sanitized = $request->getSanitized();

        // Store the Application
        return $app;
        $application = Application::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/applications'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/applications');*/
    }

    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @throws AuthorizationException
     * @return void
     */
    public function show(Application $application)
    {
        $this->authorize('admin.application.show', $application);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Application $application
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Application $application)
    {
        $this->authorize('admin.application.edit', $application);


        return view('admin.application.edit', [
            'application' => $application,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateApplication $request
     * @param Application $application
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateApplication $request, Application $application)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Application
        $application->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/applications'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/applications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyApplication $request
     * @param Application $application
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyApplication $request, Application $application)
    {
        $application->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyApplication $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyApplication $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Application::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
