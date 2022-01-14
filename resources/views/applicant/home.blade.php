@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')

<div class="card   text-center">
    <div class="card-header">
        <h2>Bienvenido {{ $user->name }} </h2>
        <h6>Seleccione una de las siguientes opciones para continuar</h6>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                <a href="/applications" type="button" class="btn btn-square btn-primary btn-lg btn-block">{{ trans('admin.applicant.applications') }}</a>
            </div>
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                <a href="/calls" type="button" class="btn btn-square btn-warning btn-lg btn-block">{{ trans('admin.applicant.calls') }}</a>
            </div>

            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                <a href="/resume" type="button" class="btn btn-square btn-success btn-lg btn-block">{{ trans('admin.applicant.resume') }}</a>
            </div>

            <!--<div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                <a href="/reports" type="button" class="btn btn-square btn-danger btn-lg btn-block">{{ trans('admin.applicant.reports') }}</a>
            </div>-->
        </div>

    </div>

        <!--<div class="card-body">
        <blockquote class="card-bodyquote">
        <h2>Bienvenido {{ $user->name }} </h2>
        <p>Seleccione una de las siguientes opciones para continuar</p>
        <footer>
            <div class="row align-items-center">
                <button type="button" class="btn btn-outline-primary">Primary</button>

                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                    <a href="/admin/applicants" class="btn btn-lg btn-block btn-square  btn-info" type="button">{{ trans('admin.applicant.applications') }}</a>
                </div>
                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                <a href="/admin/reports/applicants-by-resolution-social"><button class="btn btn-lg btn-block btn-square btn-lg btn-success" type="button">{{ trans('admin.applicant.calls') }}</button></a>
                </div>
                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                <a href="/admin/applicants/processed"><button class="btn btn-lg btn-block btn-square btn-warning" type="button">{{ trans('admin.applicant.resume') }}</button></a>
                </div>
                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                    <a href="/admin/applicants/disqualified"><button  class="btn btn-lg btn-block btn-square btn-danger" type="button">{{ trans('admin.applicant.reports') }}</button></a>
                </div>
                </div>
        </footer>
        </blockquote>
        </div>-->
    </div>

    @include('applicant.dashboard.calls')

@endsection
