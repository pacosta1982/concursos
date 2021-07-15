import AppForm from '../app-components/Form/AppForm';

Vue.component('resume-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                names:  '' ,
                last_names:  '' ,
                government_id:  '' ,
                birthdate:  '' ,
                gender:  '' ,
                nationality:  '' ,
                address:  '' ,
                neighborhood:  '' ,
                phone:  '' ,
                email:  '' ,
                
            }
        }
    }

});