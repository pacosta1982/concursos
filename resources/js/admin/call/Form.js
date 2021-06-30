import AppForm from '../app-components/Form/AppForm';

Vue.component('call-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                description:  '' ,
                call_type_id:  '' ,
                position_id:  '' ,
                company_id:  '' ,
                start:  '' ,
                end:  '' ,
                
            }
        }
    }

});