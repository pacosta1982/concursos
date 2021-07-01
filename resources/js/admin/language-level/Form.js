import AppForm from '../app-components/Form/AppForm';

Vue.component('language-level-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});