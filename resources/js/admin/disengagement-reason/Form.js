import AppForm from '../app-components/Form/AppForm';

Vue.component('disengagement-reason-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});