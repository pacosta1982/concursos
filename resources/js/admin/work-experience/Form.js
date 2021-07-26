import AppForm from '../app-components/Form/AppForm';

Vue.component('work-experience-form', {
    mixins: [AppForm],
    props: ['end_reason', 'resume'],
    data: function () {
        return {
            form: {
                resume_id: this.resume,
                company: '',
                position: '',
                tasks: '',
                start: '',
                end: '',
                end_reason_id: '',
                contact: '',

            }
        }
    }

});
