import AppForm from '../app-components/Form/AppForm';

Vue.component('application-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                code:  '' ,
                call_id:  '' ,
                resume_id:  '' ,
                data:  this.getLocalizedFormDefaults() ,
                
            }
        }
    }

});