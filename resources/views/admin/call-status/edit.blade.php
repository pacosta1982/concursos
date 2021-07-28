@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.call-status.actions.edit', ['name' => $callStatus->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <call-status-form
                :action="'{{ $callStatus->resource_url }}'"
                :data="{{ $callStatus->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.call-status.actions.edit', ['name' => $callStatus->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.call-status.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </call-status-form>

        </div>
    
</div>

@endsection