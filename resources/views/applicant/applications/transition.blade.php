@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Importante!</strong> <br>

    Declaro bajo fe de juramento, que toda la información expresada en cada una de las hojas del presente formulario,
    especialmente en cuanto al Curriculum Vitae, se ajustan a la verdad, obligándome a presentar los documentos que avalen dichas informaciones en la etapa
    correspondiente conforme a la normativa vigente, aceptando mi exclusión en caso de incumplimiento,
    omisión o presencia de causales de eliminación del Reglamento General de Selección. Dejo expresa constancia de tener total conocimiento de las bases y
    condiciones del presente Concurso, a las cuales acepto someterme íntegramente y acatar las obligaciones dispuestas.

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
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
                <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text">Potulante:</p>
            </div>
            <div class="form-group col-sm-8">
                <p class="card-text"><strong>{{$resume->names}} {{$resume->last_names}}</strong></p>
            </div>
        </div>
    </div>
</div>



@endsection
