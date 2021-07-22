import AppForm from '../app-components/Form/AppForm';

Vue.component('end-reason-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});