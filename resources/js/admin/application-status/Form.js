import AppForm from '../app-components/Form/AppForm';

Vue.component('application-status-form', {
    mixins: [AppForm],
    props:['user','application','status'],
    data: function() {
        return {
            form: {
                application_id:  this.application  ,
                status_id:  this.status  ,
                user:  this.user ,
                user_model:  'App\Models\User' ,
                description:  '' ,

            }
        }
    }

});
