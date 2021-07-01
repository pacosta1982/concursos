import AppForm from '../app-components/Form/AppForm';

Vue.component('ethnic-group-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});