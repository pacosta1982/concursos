import AppForm from '../app-components/Form/AppForm';

Vue.component('application-form', {
    mixins: [AppForm],
    props: ['data', 'call', 'resume'],
    data: function () {
        return {
            form: {
                code: '1',
                call_id: '1',
                resume_id: '1',
                data: '',

            }
        }
    }

});
