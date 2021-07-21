import AppForm from '../app-components/Form/AppForm';

Vue.component('academic-state-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});