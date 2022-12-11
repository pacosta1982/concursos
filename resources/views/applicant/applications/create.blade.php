@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')
@if ($resume)
<!--<a href={{ url('calls/'.$call->id.'/application/'.$resume->id.'/transition') }} class="btn btn-block bg-warning" type="button"> <strong><i class="fa fa-paper-plane"></i> Enviar Postulación</strong></a>
<br> -->
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
    </div>
</div>
<!--<a href="{{ url('calls/'.$call->id.'/application/'.$resume->id.'/transitionsave') }}" class="btn btn-block btn-square btn-lg text-white bg-primary"><i class="fa fa-paper-plane">
    </i> Enviar</a>-->


    <div class="card">


        <form action="{{ url('applications') }}" class="form-horizontal form-create"  method="post" enctype="multipart/form-data">
            <input type="text" hidden name="call_id" value="{{ $call->id }}">
            <input type="text" hidden name="resume_id" value="{{ $resume->id }}">
            <div class="card-header">
            <i class="fa fa-plus"></i> {{ trans('admin.applicant-document.actions.create') }}
        </div>
        @csrf
        <div class="card-body">
            <div class="alert alert-success">
            <ul>
                <li>Adjunte constancia de verificación de legajo.</li>
            </ul>
        </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="form-group col-sm-12" :class="{'has-danger': errors.has('address')}">
                <label for="document" >{{ trans('admin.applicant-document.columns.file') }}</label>
                <div>
                    <input type="file" name="file" class="form-control-file" id="chooseFile">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <button type="submit" class="btn btn-block btn-square btn-lg text-white bg-primary" >
                    <i class="fa fa-paper-plane"></i>
                    Enviar
                </button>
            </div>

        </div>
        </form>
    </div>


<br>
  <div class="card">
    <div class="card-header text-center">
         DATOS PERSONALES DEL/LA POSTULANTE
    </div>
    <!--<h5 class="card-header text-center">Currículo - {{$resume->names}} {{$resume->last_names}}</h5>-->
    <div class="card-body">

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

    <div class="card-body">
        <table class="table table-hover table-listing">
            <thead>
                <tr>
                    <th >{{ trans('admin.academic-training.columns.education_level_id') }}</th>
                    <th >{{ trans('admin.academic-training.columns.academic_state_id') }}</th>
                    <th >{{ trans('admin.academic-training.columns.name') }}</th>
                    <th >{{ trans('admin.academic-training.columns.institution') }}</th>
                    <th class="text-center">{{ trans('admin.academic-training.columns.registered') }}</th>
                    <th ></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resume->academic as $item)
                <tr>
                    <td>{{$item->education_level->name}}</td>
                    <td>{{$item->academic_state->name}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->institution}}</td>
                    <td class="text-center"><i class="{{ $item->registered ? 'fa fa-check text-success' : 'fa fa-times text-danger '}}" aria-hidden="true"></i></td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>

  <div class="card">
    <div class="card-header text-center">
         EXPERIENCIA LABORAL
    </div>

    <div class="card-body">
        <table class="table table-hover table-listing">
            <thead>
                <tr>
                    <th>{{ trans('admin.work-experience.columns.company') }}</th>
                    <th>{{ trans('admin.work-experience.columns.position') }}</th>
                    <th>{{ trans('admin.work-experience.columns.start') }}</th>
                    <th>{{ trans('admin.work-experience.columns.end') }}</th>
                    <th>{{ trans('admin.work-experience.columns.end_reason_id') }}</th>
                    <th>{{ trans('admin.work-experience.columns.tasks') }}</th>
                    <th>{{ trans('admin.work-experience.columns.contact') }}</th>
                    <th ></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resume->work as $item)
                <tr>
                    <td>{{$item->company}}</td>
                    <td>{{$item->position}}</td>
                    <td></td>
                    <td></td>
                    <td>{{$item->end_reason->name}}</td>
                    <td>{{$item->tasks}}</td>
                    <td>{{$item->contact}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>

  <div class="card">
    <div class="card-header text-center">
         MANEJO DE IDIOMAS
    </div>

    <div class="card-body">
        <table class="table table-hover table-listing">
            <thead>
                <tr>
                    <th >{{ trans('admin.language-level-resume.columns.language_id') }}</th>
                    <th >{{ trans('admin.language-level-resume.columns.language_level_id') }}</th>
                    <th class="text-center">{{ trans('admin.language-level-resume.columns.certificate') }}</th>
                    <th ></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resume->languages as $item)
                <tr>
                    <td>{{$item->language->name}}</td>
                    <td>{{$item->language_level->name}}</td>
                    <td class="text-center"><i class="{{ $item->certificate ? 'fa fa-check text-success' : 'fa fa-times text-danger '}}" aria-hidden="true"></i></td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>

  <div class="card">
    <div class="card-header text-center">
         DISCAPACIDAD
    </div>

    <div class="card-body">
        <table class="table table-hover table-listing">
            <thead>
                <tr>
                    <th >{{ trans('admin.disability-resume.columns.disability_id') }}</th>
                    <th >{{ trans('admin.disability-resume.columns.cause') }}</th>
                    <th >{{ trans('admin.disability-resume.columns.percent') }}</th>
                    <th class="text-center">{{ trans('admin.disability-resume.columns.certificate') }}</th>
                    <th >{{ trans('admin.disability-resume.columns.certificate_date') }}</th>
                    <th ></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resume->disability as $item)
                <tr>
                    <td>{{$item->disability->name}}</td>
                    <td>{{$item->cause}}</td>
                    <td>{{$item->percent}}</td>
                    <td class="text-center"><i class="{{ $item->certificate ? 'fa fa-check text-success' : 'fa fa-times text-danger '}}" aria-hidden="true"></i></td>
                    <td>{{$item->certificate_date}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>

  <div class="card">
    <div class="card-header text-center">
         GRUPO ETHNICO
    </div>

    <div class="card-body">
        <table class="table table-hover table-listing">
            <thead>
                <tr>
                    <th >{{ trans('admin.ethnic-resume.columns.name') }}</th>
                    <th >{{ trans('admin.ethnic-resume.columns.zone') }}</th>
                    <th class="text-center">{{ trans('admin.ethnic-resume.columns.registered') }}</th>
                    <th ></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resume->ethnic as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->zone}}</td>
                    <td class="text-center"><i class="{{ $item->registered ? 'fa fa-check text-success' : 'fa fa-times text-danger '}}" aria-hidden="true"></i></td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
@else

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Importante!</strong> <br>

    <h4>Para postularse debe crear un curriculo primero.</h4>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    <a href="/resume/create" class="btn btn-block btn-square btn-lg bg-primary"><i class="fa fa-plus"></i> Crea Tu Currículo</a>
@endif




@endsection
