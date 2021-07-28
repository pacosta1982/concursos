<div class="form-group row align-items-center" :class="{'has-danger': errors.has('resume_id'), 'has-success': fields.resume_id && fields.resume_id.valid }">
    <label for="resume_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ethnic-resume.columns.resume_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.resume_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('resume_id'), 'form-control-success': fields.resume_id && fields.resume_id.valid}" id="resume_id" name="resume_id" placeholder="{{ trans('admin.ethnic-resume.columns.resume_id') }}">
        <div v-if="errors.has('resume_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('resume_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ethnic-resume.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.ethnic-resume.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('zone'), 'has-success': fields.zone && fields.zone.valid }">
    <label for="zone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ethnic-resume.columns.zone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.zone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('zone'), 'form-control-success': fields.zone && fields.zone.valid}" id="zone" name="zone" placeholder="{{ trans('admin.ethnic-resume.columns.zone') }}">
        <div v-if="errors.has('zone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('zone') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('registered'), 'has-success': fields.registered && fields.registered.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="registered" type="checkbox" v-model="form.registered" v-validate="''" data-vv-name="registered"  name="registered_fake_element">
        <label class="form-check-label" for="registered">
            {{ trans('admin.ethnic-resume.columns.registered') }}
        </label>
        <input type="hidden" name="registered" :value="form.registered">
        <div v-if="errors.has('registered')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('registered') }}</div>
    </div>
</div>


