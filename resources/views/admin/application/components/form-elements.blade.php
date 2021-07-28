
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('code'), 'has-success': fields.code && fields.code.valid }">
    <label for="code" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application.columns.code') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.code" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('code'), 'form-control-success': fields.code && fields.code.valid}" id="code" name="code" placeholder="{{ trans('admin.application.columns.code') }}">
        <div v-if="errors.has('code')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('code') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('call_id'), 'has-success': fields.call_id && fields.call_id.valid }">
    <label for="call_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application.columns.call_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.call_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('call_id'), 'form-control-success': fields.call_id && fields.call_id.valid}" id="call_id" name="call_id" placeholder="{{ trans('admin.application.columns.call_id') }}">
        <div v-if="errors.has('call_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('call_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('resume_id'), 'has-success': fields.resume_id && fields.resume_id.valid }">
    <label for="resume_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application.columns.resume_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.resume_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('resume_id'), 'form-control-success': fields.resume_id && fields.resume_id.valid}" id="resume_id" name="resume_id" placeholder="{{ trans('admin.application.columns.resume_id') }}">
        <div v-if="errors.has('resume_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('resume_id') }}</div>
    </div>
</div>


