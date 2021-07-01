@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.disengagement-reason.actions.edit', ['name' => $disengagementReason->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <disengagement-reason-form
                :action="'{{ $disengagementReason->resource_url }}'"
                :data="{{ $disengagementReason->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.disengagement-reason.actions.edit', ['name' => $disengagementReason->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.disengagement-reason.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </disengagement-reason-form>

        </div>
    
</div>

@endsection