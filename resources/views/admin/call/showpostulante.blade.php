@extends('brackets/admin-ui::admin.layout.default')

@section('title', 'Resumen Postulante')

@section('body')

<div class="card">
    <div class="card-header text-center">
         CURRICULO - {{$resume->names}} {{$resume->last_names}}
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
                <p class="card-text">Departamento: {{$resume->state->DptoNom}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">Ciudad: {{$resume->city->CiuNom}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Barrio: {{$resume->neighborhood}}</p>
            </div>

    </div>
    <div class="row">
        <div class="form-group col-sm-4">
            <p class="card-text">Direccion: {{$resume->address}}</p>
        </div>

        <div class="form-group col-sm-4">
            <p class="card-text">Nacionalidad: {{$resume->nationality}}</p>
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
                <p class="card-text">Nacimiento: {{$resume->birthdate}}</p>
            </div>

            <div class="form-group col-sm-4">
                <p class="card-text">Email: {{$resume->email}}</p>
            </div>
    </div>
    <!--<a href="resume/{{$resume->id}}/edit" class="btn btn-primary">Editar</a>-->
    </div>
  </div>

  <div class="card">
    <div class="card-body text-center">
        <h4>OPCIONES DISPONIBLES</h4>
         <div class="row">
            @foreach ($navegacion as $item)
                <div class="col">
                    <a href="{{ url('admin/calls/'.$call->id.'/transition/'.$resume->id.'/'.$item->id) }}" type="button" style="background-color: {{ $item->color }}; color:white; font-weight: bold; " class="btn btn-square  btn-lg btn-block">{{ $item->name }}</a>
                </div>
            @endforeach
        </div>
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
                    <th >{{ trans('admin.academic-training.columns.workload') }}</th>
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
                    <td>{{$item->workload}}</td>
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
                    <td>{{$item->start}}</td>
                    <td>{{$item->end}}</td>
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



@endsection
