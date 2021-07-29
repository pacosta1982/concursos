import AppForm from '../app-components/Form/AppForm';

Vue.component('disability-resume-form', {
    mixins: [AppForm],
    props: ['disability', 'resume'],
    data: function () {
        return {
            form: {
                resume_id: this.resume,
                disability: '',
                cause: '',
                percent: '',
                certificate: '',
                certificate_date: '',

            }
        }
    }

});
