import AppListing from '../app-components/Listing/AppListing';

Vue.component('application-listing', {
    mixins: [AppListing],
    props: ['status'],
    mounted() {
        //console.log(this.status);
        this.onSuccess();
    },
    methods: {
        onSuccess() {

            if (this.status == 'success') {
                this.$notify({ type: 'success', title: 'Exito!', text: 'Se ha Postulado Correctamente.' });
            }
            if (this.status == 'error') {
                //this.$notify({ type: 'error', title: 'Error!', text: 'Ya se ha Postulado para esta convocatoria.' });
            }
        }
    }
});
