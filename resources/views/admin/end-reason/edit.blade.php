@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.end-reason.actions.edit', ['name' => $endReason->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <end-reason-form
                :action="'{{ $endReason->resource_url }}'"
                :data="{{ $endReason->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.end-reason.actions.edit', ['name' => $endReason->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.end-reason.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </end-reason-form>

        </div>
    
</div>

@endsection