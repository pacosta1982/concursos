<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.call.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.description" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('description'), 'form-control-success': fields.description && fields.description.valid}" id="description" name="description" placeholder="{{ trans('admin.call.columns.description') }}">
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('call_type_id'), 'has-success': fields.call_type_id && fields.call_type_id.valid }">
    <label for="call_type_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.call.columns.call_type_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <input type="text" v-model="form.call_type_id" v-validate="'required|integer'" @input="validate($event)" class="form-control"
        :class="{'form-control-danger': errors.has('call_type_id'), 'form-control-success': fields.call_type_id && fields.call_type_id.valid}"
        id="call_type_id" name="call_type_id" placeholder="{{ trans('admin.call.columns.call_type_id') }}"> -->
        <multiselect
            v-model="form.call_type"
            :options="call_type"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.call.columns.call_type_id') }}">
        </multiselect>
        <div v-if="errors.has('call_type_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('call_type_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('position_id'), 'has-success': fields.position_id && fields.position_id.valid }">
    <label for="position_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.call.columns.position_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!--<input type="text" v-model="form.position_id" v-validate="'required|integer'" @input="validate($event)" class="form-control"
        :class="{'form-control-danger': errors.has('position_id'), 'form-control-success': fields.position_id && fields.position_id.valid}"
        id="position_id" name="position_id" placeholder="{{ trans('admin.call.columns.position_id') }}"> -->
        <multiselect
            v-model="form.position"
            :options="cargo"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.call.columns.position_id') }}">
        </multiselect>
        <div v-if="errors.has('position_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('position_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('company_id'), 'has-success': fields.company_id && fields.company_id.valid }">
    <label for="company_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.call.columns.company_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!--<input type="text" v-model="form.company_id" v-validate="'required|integer'" @input="validate($event)" class="form-control"
        :class="{'form-control-danger': errors.has('company_id'), 'form-control-success': fields.company_id && fields.company_id.valid}"
        id="company_id" name="company_id" placeholder="{{ trans('admin.call.columns.company_id') }}"> -->
        <multiselect
            v-model="form.company"
            :options="institucion"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.call.columns.company_id') }}">
        </multiselect>
        <div v-if="errors.has('company_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('company_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start'), 'has-success': fields.start && fields.start.valid }">
    <label for="start" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.call.columns.start') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start" :config="datetimePickerConfig" v-validate="'required'" class="flatpickr" :class="{'form-control-danger': errors.has('start'), 'form-control-success': fields.start && fields.start.valid}" id="start" name="start" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('start')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end'), 'has-success': fields.end && fields.end.valid }">
    <label for="end" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.call.columns.end') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end" :config="datetimePickerConfig" v-validate="'required'" class="flatpickr" :class="{'form-control-danger': errors.has('end'), 'form-control-success': fields.end && fields.end.valid}" id="end" name="end" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('end')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('footnote'), 'has-success': fields.footnote && fields.footnote.valid }">
    <label for="end" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.call.columns.footnote') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!--<div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end" :config="datetimePickerConfig" v-validate="'required'" class="flatpickr" :class="{'form-control-danger': errors.has('end'), 'form-control-success': fields.end && fields.end.valid}" id="end" name="end" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div> -->
        <wysiwyg v-model="form.footnote" v-validate="'required'" id="text" name="text" :config="mediaWysiwygConfig" />
        <div v-if="errors.has('footnote')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('footnote') }}</div>
    </div>

</div>


