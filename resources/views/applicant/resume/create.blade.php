@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')

<div class="container-xl">

                <div class="card">

        <resume-form
            :action="'{{ url('resume') }}'"
            :finddataurl = "'{{ url('resume') }}'"
            :state="{{ $state->toJson() }}"
            :city="{{ $city->toJson() }}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.resume.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.resume.components.form-elements')
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </resume-form>

        </div>

        </div>

@endsection
