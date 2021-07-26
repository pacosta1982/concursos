@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.application.actions.edit', ['name' => $application->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <application-form
                :action="'{{ $application->resource_url }}'"
                :data="{{ $application->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.application.actions.edit', ['name' => $application->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.application.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </application-form>

        </div>
    
</div>

@endsection