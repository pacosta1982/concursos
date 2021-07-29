@extends('brackets/admin-ui::admin.layout.usersys')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')


<div class="container-xl">

<div class="container-xl">

                <div class="card">

        <disability-resume-form
            :action="'{{ url('/resume/disability-resumes') }}'"
            :disability="{{ $disability->toJson() }}"
            :resume="{{ $resume->id }}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.disability-resume.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.disability-resume.components.form-elements')
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </disability-resume-form>

        </div>

        </div>


@endsection
