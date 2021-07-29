<!--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('resume_id'), 'has-success': fields.resume_id && fields.resume_id.valid }">
    <label for="resume_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disability-resume.columns.resume_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.resume_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('resume_id'), 'form-control-success': fields.resume_id && fields.resume_id.valid}" id="resume_id" name="resume_id" placeholder="{{ trans('admin.disability-resume.columns.resume_id') }}">
        <div v-if="errors.has('resume_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('resume_id') }}</div>
    </div>
</div>-->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('disability_id'), 'has-success': fields.disability_id && fields.disability_id.valid }">
    <label for="disability_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disability-resume.columns.disability_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!--<input type="text" v-model="form.disability_id" v-validate="'required|integer'" @input="validate($event)"
        class="form-control" :class="{'form-control-danger': errors.has('disability_id'), 'form-control-success': fields.disability_id && fields.disability_id.valid}"
        id="disability_id" name="disability_id" placeholder="{{ trans('admin.disability-resume.columns.disability_id') }}">-->
        <multiselect
            v-model="form.disability"
            :options="disability"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.academic-training.columns.disability_id') }}">
        </multiselect>
        <div v-if="errors.has('disability_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('disability_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cause'), 'has-success': fields.cause && fields.cause.valid }">
    <label for="cause" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disability-resume.columns.cause') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cause" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cause'), 'form-control-success': fields.cause && fields.cause.valid}" id="cause" name="cause" placeholder="{{ trans('admin.disability-resume.columns.cause') }}">
        <div v-if="errors.has('cause')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cause') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('percent'), 'has-success': fields.percent && fields.percent.valid }">
    <label for="percent" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disability-resume.columns.percent') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.percent" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('percent'), 'form-control-success': fields.percent && fields.percent.valid}" id="percent" name="percent" placeholder="{{ trans('admin.disability-resume.columns.percent') }}">
        <div v-if="errors.has('percent')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('percent') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('certificate'), 'has-success': fields.certificate && fields.certificate.valid }">
    <label for="certificate" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disability-resume.columns.certificate') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.certificate" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('certificate'), 'form-control-success': fields.certificate && fields.certificate.valid}" id="certificate" name="certificate" placeholder="{{ trans('admin.disability-resume.columns.certificate') }}">
        <div v-if="errors.has('certificate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('certificate') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('certificate_date'), 'has-success': fields.certificate_date && fields.certificate_date.valid }">
    <label for="certificate_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disability-resume.columns.certificate_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.certificate_date" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('certificate_date'), 'form-control-success': fields.certificate_date && fields.certificate_date.valid}" id="certificate_date" name="certificate_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('certificate_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('certificate_date') }}</div>
    </div>
</div>


