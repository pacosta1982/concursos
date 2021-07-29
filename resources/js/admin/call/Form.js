import AppForm from '../app-components/Form/AppForm';

Vue.component('call-form', {
    mixins: [AppForm],
    props: ['call_type', 'cargo', 'institucion'],
    data: function () {
        return {
            form: {
                description: '',
                call_type: '',
                position: '',
                company: '',
                start: '',
                end: '',
                footnote: '',
                vacancies: '',

            },
            mediaCollections: ['gallery']
        }
    }

});
