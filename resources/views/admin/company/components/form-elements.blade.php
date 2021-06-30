<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.company.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('acronym'), 'has-success': fields.acronym && fields.acronym.valid }">
    <label for="acronym" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.acronym') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.acronym" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('acronym'), 'form-control-success': fields.acronym && fields.acronym.valid}" id="acronym" name="acronym" placeholder="{{ trans('admin.company.columns.acronym') }}">
        <div v-if="errors.has('acronym')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('acronym') }}</div>
    </div>
</div>


