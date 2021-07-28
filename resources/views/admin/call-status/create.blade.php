@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.call-status.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <call-status-form
            :action="'{{ url('admin/call-statuses') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.call-status.actions.create') }}
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