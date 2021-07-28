@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')

<div class="row">
    <div class="form-group col-sm-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ trans('admin.work-experience.actions.index') }}
            </div>
            <div class="card-body">
                {{ $chartjs->render() }}
            </div>
        </div>
    </div>
    <div class="form-group col-sm-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ trans('admin.work-experience.actions.index') }}
            </div>
            <div class="card-body">
                {{ $chartjs2->render() }}
            </div>
        </div>
    </div>
</div>




@endsection
