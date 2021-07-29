@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.call.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <call-form
            :action="'{{ url('admin/calls') }}'"
            :call_type="{{ $tipo_llamado->toJson() }}"
            :cargo="{{ $cargo->toJson() }}"
            :institucion="{{ $institucion->toJson() }}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.call.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.call.components.form-elements')
                    @include('brackets/admin-ui::admin.includes.media-uploader', [
                            'mediaCollection' => app(App\Models\Call::class)->getMediaCollection('gallery'),
                            //'media' => $call->getThumbs200ForCollection('gallery'),
                            'label' => 'Documentos Adjuntos'
                        ])
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </call-form>

        </div>

        </div>


@endsection
