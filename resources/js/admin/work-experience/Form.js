import AppForm from '../app-components/Form/AppForm';

Vue.component('work-experience-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                resume_id:  '' ,
                company:  '' ,
                position:  '' ,
                tasks:  '' ,
                start:  '' ,
                end:  '' ,
                end_reason_id:  '' ,
                contact:  '' ,
                
            }
        }
    }

});