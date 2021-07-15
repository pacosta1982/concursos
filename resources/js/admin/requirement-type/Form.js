import AppForm from '../app-components/Form/AppForm';

Vue.component('requirement-type-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});