import AppForm from '../app-components/Form/AppForm';

Vue.component('disability-resume-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                resume_id:  '' ,
                disability_id:  '' ,
                cause:  '' ,
                percent:  '' ,
                certificate:  '' ,
                certificate_date:  '' ,
                
            }
        }
    }

});