@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applications.actions.transition'))

@section('body')

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Importante!</strong> <br>

    Este cambio de estado quedara registrado en el historial de la postulación

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<div class="card">

<div class="card-header">
         <div class="row">
            <div class="form-group col-sm-6">
                <p class="card-text">Postulante: {{ $resume->names }} {{ $resume->last_names }} - CI: {{ $resume->government_id }}</p>
            </div>

            <div class="form-group col-sm-6">
                <p class="card-text">Estado: {{ $status->name }} </p>
            </div>
        </div>


    </div>
</div>

<div class="card">

    <div class="card-body">
        <application-status-form
            :action="'{{ url('admin/application-statuses') }}'"
            :user="'{{ (string)$user }}'"
            :status="'{{ $status->id }}'"
            :application="'{{ $appid }}'"

            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.application-status.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.application-status.components.form-elements')
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </application-status-form>
    </div>

</div>




@endsection
