@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.document'))

@section('body')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> DOCUMENTOS
                {{ $application->resume->names }} {{ $application->resume->last_names }}
                 - LLAMADO {{ $application->call->description }}
            </div>

                @if (!empty($documents))
                <div class="card-body">

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Importante!</strong> <br>

                        Al subir un nuevo documento se descarta el anterior.

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                   <p>Documento Adjuntado:  <a target="_blank" href="{{ $application->document_url }}">{{$aux->name}}</a></p>
                </div>
                @endif

        </div>
    </div>
</div>



<div class="card">

    <form action="{{ url('applications/documents') }}" class="form-horizontal form-create"  method="post" enctype="multipart/form-data">
        <input type="text" hidden name="app_id" value="{{ $application->id }}">
        <div class="card-header">
        <i class="fa fa-plus"></i> {{ trans('admin.applicant-document.actions.create') }}
    </div>
    @csrf
    <div class="card-body">
        <!--<div class="alert alert-success">
        <ul>
            <li>Solo es necesario subir fotos de las cédulas y en el caso del documento de la tenencia subir foto de la portada del mismo.</li>
        </ul>
    </div>-->
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


@endsection
