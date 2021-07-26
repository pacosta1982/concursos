@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')


<div class="card">
    <div class="card-header text-center">
         FORMULARIO DE POSTULACIÓN
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Nombre de la Institución que llama al Concurso:</p>
            </div>
            <div class="form-group col-sm-8">
                <p class="card-text"><strong>{{$call->company->name}}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Puesto  al que postula:</p>
            </div>
            <div class="form-group col-sm-8">
                <p class="card-text"><strong>{{$call->position->name}}</strong></p>
            </div>
        </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header text-center">
         DATOS PERSONALES DEL/LA POSTULANTE
    </div>
    <!--<h5 class="card-header text-center">Currículo - {{$resume->names}} {{$resume->last_names}}</h5>-->
    <div class="card-body">
      <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Nombres: {{$resume->names}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Apellidos: {{$resume->last_names}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Sexo: {{$resume->gender}}</p>
            </div>
    </div>
          <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Ciudad: </p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Barrio: {{$resume->neighborhood}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Direccion: {{$resume->address}}</p>
            </div>
    </div>
    <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Nacionalidad: {{$resume->nationality}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Nacimiento: {{$resume->birthdate}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Documento: {{number_format($resume->government_id,0,'','.')}}</p>
            </div>
    </div>
    <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Telefono: {{$resume->phone}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Email: {{$resume->email}}</p>
            </div>
    </div>
    <!--<a href="resume/{{$resume->id}}/edit" class="btn btn-primary">Editar</a>-->
    </div>
  </div>

  <div class="card">
    <div class="card-header text-center">
         INFORMACIÓN ACADÉMICA
    </div>
    <!--<h5 class="card-header text-center">Currículo - {{$resume->names}} {{$resume->last_names}}</h5>-->
    <div class="card-body">
      <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Nombres: {{$resume->names}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Apellidos: {{$resume->last_names}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Sexo: {{$resume->gender}}</p>
            </div>
    </div>
          <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Ciudad: </p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Barrio: {{$resume->neighborhood}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Direccion: {{$resume->address}}</p>
            </div>
    </div>
    <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Nacionalidad: {{$resume->nationality}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Nacimiento: {{$resume->birthdate}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Documento: {{number_format($resume->government_id,0,'','.')}}</p>
            </div>
    </div>
    <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Telefono: {{$resume->phone}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Email: {{$resume->email}}</p>
            </div>
    </div>
    <!--<a href="resume/{{$resume->id}}/edit" class="btn btn-primary">Editar</a>-->
    </div>
  </div>

@endsection
