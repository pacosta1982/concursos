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
    public function index(IndexApplication $request)
    {
        // create and AdminListing instance for a specific model and
        $resume = Resume::where('created_by', Auth::user()->id)->first();
        $authID = $resume->id;
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

        if (!$app) {
            # code...
            $application = new Application;

            $application->code = 'ABC';
            $application->call_id = $call->id;
            $application->resume_id = $resume->id;
            $application->data = $resume->toJson();
            $application->save();

            $status = new ApplicationStatus;

            $status->application_id = $application->id;
            $status->status_id = 1;
            $status->user = Auth::user()->id;
            $status->user_model = 'App\Models\User';

            $status->save();
            return redirect('applications')->with('status', 'success');;
        } else {
            return redirect('calls')->with('status', 'error');
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
        return $request;
        dd($request);
        //Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Application
        dd($sanitized);
        $application = Application::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/applications'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/applications');
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
