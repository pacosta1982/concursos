<div class="row">
    <div class="form-group col-sm-4">
        <label for="government_id" >{{ trans('admin.resume.columns.government_id') }}</label>
        <div class="input-group mb-3">
        <input @change="findData" type="text" value="3496101" v-model="form.government_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('government_id'), 'form-control-success': fields.government_id && fields.government_id.valid}" id="government_id" name="government_id" placeholder="{{ trans('admin.resume.columns.government_id') }}">
        <div v-if="errors.has('government_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('government_id') }}</div>
        <div class="input-group-append">
            <button @click="findData" class="btn btn-primary" type="button"><i class="fa fa-random" aria-hidden="true"></i></button>
          </div>
          </div>
    </div>

    <div class="form-group col-sm-4">
        <label for="names">{{ trans('admin.resume.columns.names') }}</label>
        <input readonly type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" v-model="form.names" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('names'), 'form-control-success': fields.names && fields.names.valid}" id="names" name="names" placeholder="{{ trans('admin.resume.columns.names') }}">
        <div v-if="errors.has('names')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('names') }}</div>
    </div>
    <div class="form-group col-sm-4">
        <label for="last_names" >{{ trans('admin.resume.columns.last_names') }}</label>
        <input readonly type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" v-model="form.last_names" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('last_names'), 'form-control-success': fields.last_names && fields.last_names.valid}" id="last_names" name="last_names" placeholder="{{ trans('admin.resume.columns.last_names') }}">
        <div v-if="errors.has('last_names')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_names') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-4">
        <label for="nationality" >{{ trans('admin.resume.columns.nationality') }}</label>
        <input readonly type="text" v-model="form.nationality" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nationality'), 'form-control-success': fields.nationality && fields.nationality.valid}" id="nationality" name="nationality" placeholder="{{ trans('admin.resume.columns.nationality') }}">
        <div v-if="errors.has('nationality')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nationality') }}</div>
    </div>

    <div class="form-group col-sm-4">
        <label for="gender">{{ trans('admin.resume.columns.gender') }}</label>
        <input readonly type="text" v-model="form.gender" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('gender'), 'form-control-success': fields.gender && fields.gender.valid}" id="gender" name="gender" placeholder="{{ trans('admin.resume.columns.gender') }}">
        <div v-if="errors.has('gender')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gender') }}</div>
    </div>
    <div class="form-group col-sm-4">
        <label for="birthdate">{{ trans('admin.resume.columns.birthdate') }}</label>
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime

            v-model="form.birthdate"
            :config="datePickerConfig"
            class="flatpickr"
            :class="{'form-control-danger': errors.has('birthdate'), 'form-control-success': fields.birthdate && fields.birthdate.valid}"
            id="birthdate" name="birthdate"
            placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}">
        </datetime>
        </div>
        <div v-if="errors.has('birthdate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birthdate') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-3">
        <label for="address" >{{ trans('admin.resume.columns.address') }}</label>
        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" v-model="form.address" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.resume.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
    <div class="form-group col-sm-3">
        <label for="neighborhood" >{{ trans('admin.resume.columns.neighborhood') }}</label>
        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" v-model="form.neighborhood" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('neighborhood'), 'form-control-success': fields.neighborhood && fields.neighborhood.valid}" id="neighborhood" name="neighborhood" placeholder="{{ trans('admin.resume.columns.neighborhood') }}">
        <div v-if="errors.has('neighborhood')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('neighborhood') }}</div>
    </div>
        <div class="form-group col-sm-3">
        <label for="phone" >{{ trans('admin.resume.columns.phone') }}</label>
        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" v-model="form.phone" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone'), 'form-control-success': fields.phone && fields.phone.valid}" id="phone" name="phone" placeholder="{{ trans('admin.resume.columns.phone') }}">
        <div v-if="errors.has('phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone') }}</div>
    </div>
        <div class="form-group col-sm-3">
        <label for="neighborhood" >{{ trans('admin.resume.columns.email') }}</label>
        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" v-model="form.email" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.resume.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>

</div>

<!-- -->

<!--<div class="row">
    <div class="form-group col-sm-4">
        <label for="property_id">{{ trans('admin.applicant.columns.property_id') }}</label>
        <input type="text" v-model="form.property_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('property_id'), 'form-control-success': fields.property_id && fields.property_id.valid}" id="property_id" name="property_id" placeholder="{{ trans('admin.applicant.columns.property_id') }}">
        <div v-if="errors.has('property_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('property_id') }}</div>
    </div>
    <div class="form-group col-sm-4">
        <label for="cadaster">{{ trans('admin.applicant.columns.cadaster') }}</label>
        <input type="text" v-model="form.cadaster" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cadaster'), 'form-control-success': fields.cadaster && fields.cadaster.valid}" id="cadaster" name="cadaster" placeholder="{{ trans('admin.applicant.columns.cadaster') }}">
        <div v-if="errors.has('cadaster')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cadaster') }}</div>
    </div>
    <div class="form-group col-sm-4">
        <label for="ruc">{{ trans('admin.applicant.columns.ruc') }}</label>
        <input type="text" v-model="form.ruc" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ruc'), 'form-control-success': fields.ruc && fields.cadaster.valid}" id="ruc" name="ruc" placeholder="{{ trans('admin.applicant.columns.ruc') }}">
        <div v-if="errors.has('ruc')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ruc') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('names'), 'has-success': fields.names && fields.names.valid }">
    <label for="names" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.resume.columns.names') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.names" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('names'), 'form-control-success': fields.names && fields.names.valid}" id="names" name="names" placeholder="{{ trans('admin.resume.columns.names') }}">
        <div v-if="errors.has('names')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('names') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_names'), 'has-success': fields.last_names && fields.last_names.valid }">
    <label for="last_names" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.resume.columns.last_names') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.last_names" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('last_names'), 'form-control-success': fields.last_names && fields.last_names.valid}" id="last_names" name="last_names" placeholder="{{ trans('admin.resume.columns.last_names') }}">
        <div v-if="errors.has('last_names')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_names') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('government_id'), 'has-success': fields.government_id && fields.government_id.valid }">
    <label for="government_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.resume.columns.government_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.government_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('government_id'), 'form-control-success': fields.government_id && fields.government_id.valid}" id="government_id" name="government_id" placeholder="{{ trans('admin.resume.columns.government_id') }}">
        <div v-if="errors.has('government_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('government_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('birthdate'), 'has-success': fields.birthdate && fields.birthdate.valid }">
    <label for="birthdate" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.resume.columns.birthdate') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.birthdate" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('birthdate'), 'form-control-success': fields.birthdate && fields.birthdate.valid}" id="birthdate" name="birthdate" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('birthdate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birthdate') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('gender'), 'has-success': fields.gender && fields.gender.valid }">
    <label for="gender" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.resume.columns.gender') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.gender" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('gender'), 'form-control-success': fields.gender && fields.gender.valid}" id="gender" name="gender" placeholder="{{ trans('admin.resume.columns.gender') }}">
        <div v-if="errors.has('gender')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gender') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nationality'), 'has-success': fields.nationality && fields.nationality.valid }">
    <label for="nationality" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.resume.columns.nationality') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nationality" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nationality'), 'form-control-success': fields.nationality && fields.nationality.valid}" id="nationality" name="nationality" placeholder="{{ trans('admin.resume.columns.nationality') }}">
        <div v-if="errors.has('nationality')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nationality') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.resume.columns.address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.resume.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('neighborhood'), 'has-success': fields.neighborhood && fields.neighborhood.valid }">
    <label for="neighborhood" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.resume.columns.neighborhood') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.neighborhood" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('neighborhood'), 'form-control-success': fields.neighborhood && fields.neighborhood.valid}" id="neighborhood" name="neighborhood" placeholder="{{ trans('admin.resume.columns.neighborhood') }}">
        <div v-if="errors.has('neighborhood')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('neighborhood') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone'), 'has-success': fields.phone && fields.phone.valid }">
    <label for="phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.resume.columns.phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone'), 'form-control-success': fields.phone && fields.phone.valid}" id="phone" name="phone" placeholder="{{ trans('admin.resume.columns.phone') }}">
        <div v-if="errors.has('phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.resume.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.resume.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div> -->


