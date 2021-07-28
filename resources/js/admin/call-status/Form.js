import AppForm from '../app-components/Form/AppForm';

Vue.component('call-status-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                call_id:  '' ,
                status_id:  '' ,
                user:  '' ,
                user_model:  '' ,
                description:  '' ,
                
            }
        }
    }

});