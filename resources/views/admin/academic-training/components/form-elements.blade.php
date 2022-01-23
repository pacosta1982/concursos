<!--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('resume_id'), 'has-success': fields.resume_id && fields.resume_id.valid }">
    <label for="resume_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-training.columns.resume_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.resume_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('resume_id'), 'form-control-success': fields.resume_id && fields.resume_id.valid}" id="resume_id" name="resume_id" placeholder="{{ trans('admin.academic-training.columns.resume_id') }}">
        <div v-if="errors.has('resume_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('resume_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('education_level_id'), 'has-success': fields.education_level_id && fields.education_level_id.valid }">
    <label for="education_level_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-training.columns.education_level_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.education_level"
            :options="education"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.academic-training.columns.education_level_id') }}">
        </multiselect>
        <!--<input type="text" v-model="form.education_level_id" v-validate="'required|integer'" @input="validate($event)" class="form-control"
        :class="{'form-control-danger': errors.has('education_level_id'), 'form-control-success': fields.education_level_id && fields.education_level_id.valid}" id="education_level_id"
        name="education_level_id" placeholder="{{ trans('admin.academic-training.columns.education_level_id') }}">-->
        <div v-if="errors.has('education_level_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('education_level_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('academic_state_id'), 'has-success': fields.academic_state_id && fields.academic_state_id.valid }">
    <label for="academic_state_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-training.columns.academic_state_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!--<input type="text" v-model="form.academic_state_id" v-validate="'required|integer'" @input="validate($event)" class="form-control"
        :class="{'form-control-danger': errors.has('academic_state_id'), 'form-control-success': fields.academic_state_id && fields.academic_state_id.valid}"
        id="academic_state_id" name="academic_state_id" placeholder="{{ trans('admin.academic-training.columns.academic_state_id') }}">-->
        <multiselect
            v-model="form.academic_state"
            :options="academic"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.academic-training.columns.academic_state_id') }}">
        </multiselect>
        <div v-if="errors.has('academic_state_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('academic_state_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-training.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.academic-training.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('institution'), 'has-success': fields.institution && fields.institution.valid }">
    <label for="institution" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-training.columns.institution') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.institution" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('institution'), 'form-control-success': fields.institution && fields.institution.valid}" id="institution" name="institution" placeholder="{{ trans('admin.academic-training.columns.institution') }}">
        <div v-if="errors.has('institution')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('institution') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('workload'), 'has-success': fields.workload && fields.workload.valid }">
    <label for="workload" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.academic-training.columns.workloadlabel') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.workload"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('workload'), 'form-control-success': fields.workload && fields.workload.valid}" id="workload" name="workload" placeholder="{{ trans('admin.academic-training.columns.workloadlabel') }}">
        <div v-if="errors.has('workload')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('workload') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('registered'), 'has-success': fields.registered && fields.registered.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="registered" type="checkbox" v-model="form.registered" v-validate="''" data-vv-name="registered"  name="registered_fake_element">
        <label class="form-check-label" for="registered">
            {{ trans('admin.academic-training.columns.registered') }}
        </label>
        <input type="hidden" name="registered" :value="form.registered">
        <div v-if="errors.has('registered')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('registered') }}</div>
    </div>
</div>


