@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.call-type.actions.edit', ['name' => $callType->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <call-type-form
                :action="'{{ $callType->resource_url }}'"
                :data="{{ $callType->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.call-type.actions.edit', ['name' => $callType->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.call-type.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </call-type-form>

        </div>
    
</div>

@endsection