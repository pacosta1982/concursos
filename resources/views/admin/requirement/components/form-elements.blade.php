<!--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('position_id'), 'has-success': fields.position_id && fields.position_id.valid }">
    <label for="position_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requirement.columns.position_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.position_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('position_id'), 'form-control-success': fields.position_id && fields.position_id.valid}" id="position_id" name="position_id" placeholder="{{ trans('admin.requirement.columns.position_id') }}">
        <div v-if="errors.has('position_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('position_id') }}</div>
    </div>
</div> -->

<div class="row">
    <div class="form-group col-sm-12" :class="{'has-danger': errors.has('requirement_type_id')}">
        <label for="government_id" >{{ trans('admin.requirement.columns.requirement_type_id') }}</label>
        <multiselect
            v-model="form.requirement"
            :options="requirement"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.requirement.columns.requirement_type_id') }}">
        </multiselect>
        <div v-if="errors.has('requirement_type_id')" class="form-control-feedback form-text " v-cloak>@{{ errors.first('requirement_type_id') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12" :class="{'has-danger': errors.has('education_level_id')}">
        <label for="government_id" >{{ trans('admin.requirement.columns.education_level_id') }}</label>
        <multiselect
            v-model="form.education_level"
            :options="education_level"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.requirement.columns.requirement_type_id') }}">
        </multiselect>
        <div v-if="errors.has('education_level_id')" class="form-control-feedback form-text " v-cloak>@{{ errors.first('education_level_id') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12" :class="{'has-danger': errors.has('name')}">
        <label for="government_id" >{{ trans('admin.requirement.columns.name') }}</label>
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control"
        :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}"
        id="name" name="name" placeholder="{{ trans('admin.requirement.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text " v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>




