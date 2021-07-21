import AppForm from '../app-components/Form/AppForm';

Vue.component('academic-training-form', {
    mixins: [AppForm],
    props: ['education', 'academic', 'resume'],
    data: function () {
        return {
            form: {
                resume_id: this.resume,
                education_level_id: '',
                academic_state_id: '',
                name: '',
                institution: '',
                registered: false,

            }
        }
    }

});
