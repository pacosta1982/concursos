import AppForm from '../app-components/Form/AppForm';

Vue.component('ethnic-resume-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                resume_id:  '' ,
                name:  '' ,
                zone:  '' ,
                registered:  false ,
                
            }
        }
    }

});