@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.ethnic-resume.actions.edit', ['name' => $ethnicResume->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <ethnic-resume-form
                :action="'{{ $ethnicResume->resource_url }}'"
                :data="{{ $ethnicResume->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.ethnic-resume.actions.edit', ['name' => $ethnicResume->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.ethnic-resume.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </ethnic-resume-form>

        </div>
    
</div>

@endsection