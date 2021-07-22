@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.work-experience.actions.edit', ['name' => $workExperience->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <work-experience-form
                :action="'{{ $workExperience->resource_url }}'"
                :data="{{ $workExperience->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.work-experience.actions.edit', ['name' => $workExperience->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.work-experience.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </work-experience-form>

        </div>
    
</div>

@endsection