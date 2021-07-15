import AppForm from '../app-components/Form/AppForm';

Vue.component('requirement-form', {
    mixins: [AppForm],
    props: ['requirement', 'education_level', 'position'],
    data: function () {
        return {
            form: {
                position_id: this.position,
                requirement: '',
                education_level: '',
                name: '',

            }
        }
    }

});
