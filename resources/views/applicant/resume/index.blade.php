@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')

@if ($resume)
<!--<a href="{{ url('resume/pdf') }}" class="btn btn-block btn-square btn-lg text-white bg-danger"><i class="fa fa-file-pdf-o"></i> Imprimir PDF</a>-->
<!--<br>-->
    @include('applicant.resume.header')
    <div class="alert alert-info" role="alert">
        Actualizar la pagina luego de eliminar un registro.
      </div>
    @include('applicant.resume.body')
    @include('applicant.resume.work')
    @include('applicant.resume.language')
    @include('applicant.resume.disability')

@else
    <a href="/resume/create" class="btn btn-block btn-square btn-lg bg-primary"><i class="fa fa-plus"></i> Crea Tu Currículo</a>
@endif

@endsection
