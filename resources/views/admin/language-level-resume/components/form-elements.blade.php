<!--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('resume_id'), 'has-success': fields.resume_id && fields.resume_id.valid }">
    <label for="resume_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.language-level-resume.columns.resume_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.resume_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('resume_id'), 'form-control-success': fields.resume_id && fields.resume_id.valid}" id="resume_id" name="resume_id" placeholder="{{ trans('admin.language-level-resume.columns.resume_id') }}">
        <div v-if="errors.has('resume_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('resume_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('language_id'), 'has-success': fields.language_id && fields.language_id.valid }">
    <label for="language_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.language-level-resume.columns.language_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!--<input type="text" v-model="form.language_id" v-validate="'required|integer'" @input="validate($event)"
        class="form-control" :class="{'form-control-danger': errors.has('language_id'), 'form-control-success': fields.language_id && fields.language_id.valid}"
        id="language_id" name="language_id" placeholder="{{ trans('admin.language-level-resume.columns.language_id') }}">-->
        <multiselect
            v-model="form.language"
            :options="language"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.academic-training.columns.education_level_id') }}">
        </multiselect>
        <div v-if="errors.has('language_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('language_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('language_level_id'), 'has-success': fields.language_level_id && fields.language_level_id.valid }">
    <label for="language_level_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.language-level-resume.columns.language_level_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!--<input type="text" v-model="form.language_level_id" v-validate="'required|integer'" @input="validate($event)" class="form-control"
        :class="{'form-control-danger': errors.has('language_level_id'), 'form-control-success': fields.language_level_id && fields.language_level_id.valid}"
        id="language_level_id" name="language_level_id" placeholder="{{ trans('admin.language-level-resume.columns.language_level_id') }}">-->
        <multiselect
            v-model="form.language_level"
            :options="language_level"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.academic-training.columns.education_level_id') }}">
        </multiselect>
        <div v-if="errors.has('language_level_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('language_level_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('certificate'), 'has-success': fields.certificate && fields.certificate.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="certificate" type="checkbox" v-model="form.certificate" v-validate="''" data-vv-name="certificate"  name="certificate_fake_element">
        <label class="form-check-label" for="certificate">
            {{ trans('admin.language-level-resume.columns.certificate') }}
        </label>
        <input type="hidden" name="certificate" :value="form.certificate">
        <div v-if="errors.has('certificate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('certificate') }}</div>
    </div>
</div>


