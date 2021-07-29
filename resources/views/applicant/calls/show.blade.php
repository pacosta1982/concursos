@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')

<div class="card">
    <div class="card-header text-center">
         CONVOCATORIA - {{ $call->description }}

    </div>

    <div class="card-body">
        <div class="row">
                <div class="form-group col-sm-4">
                    <p class="card-text">Tipo: <strong>{{ $call->CallType->name }}</strong></p>
                </div>

                <div class="form-group col-sm-4">
                    <p class="card-text">Cargo: <strong>{{ $call->position->name }}</strong> </p>
                </div>
                <div class="form-group col-sm-4">
                    <p class="card-text">Institución: <strong>{{ $call->company->name }}</strong></p>
                </div>
        </div>
        <div class="row">
                <div class="form-group col-sm-4">
                    <p class="card-text">Vacancias: <strong>{{ $call->vacancies }}</strong></p>
                </div>

                <div class="form-group col-sm-4">
                    <p class="card-text">Fecha Inicio: <strong>{{ $call->start }}</strong></p>
                </div>
                <div class="form-group col-sm-4">
                    <p class="card-text">Fecha Fin: <strong>{{ $call->end }}</strong></p>
                </div>
        </div>
        <div class="row">
                <table class="table table-hover table-listing">
                    <thead>
                        <tr>
                            <th>Documentos</th>
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($call->getMedia('gallery') as $item)
                        <tr>
                            <td> <a href="{{ $item->getUrl()}}" target="_blank">{{ $item->custom_properties['name'] }}</a> </td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="row">
            <wysiwyg disabled value="{{ $call->footnote }}" id="text" name="text" />
        </div>
    </div>
  </div>


@endsection
