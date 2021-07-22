<div class="form-group row align-items-center" :class="{'has-danger': errors.has('resume_id'), 'has-success': fields.resume_id && fields.resume_id.valid }">
    <label for="resume_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.work-experience.columns.resume_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.resume_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('resume_id'), 'form-control-success': fields.resume_id && fields.resume_id.valid}" id="resume_id" name="resume_id" placeholder="{{ trans('admin.work-experience.columns.resume_id') }}">
        <div v-if="errors.has('resume_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('resume_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('company'), 'has-success': fields.company && fields.company.valid }">
    <label for="company" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.work-experience.columns.company') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.company" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('company'), 'form-control-success': fields.company && fields.company.valid}" id="company" name="company" placeholder="{{ trans('admin.work-experience.columns.company') }}">
        <div v-if="errors.has('company')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('company') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('position'), 'has-success': fields.position && fields.position.valid }">
    <label for="position" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.work-experience.columns.position') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.position" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('position'), 'form-control-success': fields.position && fields.position.valid}" id="position" name="position" placeholder="{{ trans('admin.work-experience.columns.position') }}">
        <div v-if="errors.has('position')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('position') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tasks'), 'has-success': fields.tasks && fields.tasks.valid }">
    <label for="tasks" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.work-experience.columns.tasks') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.tasks" v-validate="'required'" id="tasks" name="tasks"></textarea>
        </div>
        <div v-if="errors.has('tasks')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tasks') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start'), 'has-success': fields.start && fields.start.valid }">
    <label for="start" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.work-experience.columns.start') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('start'), 'form-control-success': fields.start && fields.start.valid}" id="start" name="start" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('start')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end'), 'has-success': fields.end && fields.end.valid }">
    <label for="end" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.work-experience.columns.end') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('end'), 'form-control-success': fields.end && fields.end.valid}" id="end" name="end" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('end')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_reason_id'), 'has-success': fields.end_reason_id && fields.end_reason_id.valid }">
    <label for="end_reason_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.work-experience.columns.end_reason_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.end_reason_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('end_reason_id'), 'form-control-success': fields.end_reason_id && fields.end_reason_id.valid}" id="end_reason_id" name="end_reason_id" placeholder="{{ trans('admin.work-experience.columns.end_reason_id') }}">
        <div v-if="errors.has('end_reason_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end_reason_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('contact'), 'has-success': fields.contact && fields.contact.valid }">
    <label for="contact" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.work-experience.columns.contact') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.contact" v-validate="'required'" id="contact" name="contact"></textarea>
        </div>
        <div v-if="errors.has('contact')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contact') }}</div>
    </div>
</div>


