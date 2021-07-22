import AppForm from '../app-components/Form/AppForm';

Vue.component('language-level-resume-form', {
    mixins: [AppForm],
    props: ['language', 'language_level', 'resume'],
    data: function () {
        return {
            form: {
                resume_id: this.resume,
                language: '',
                language_level: '',
                certificate: false,

            }
        }
    }

});
