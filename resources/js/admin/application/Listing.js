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
            if (this.status == 'update') {
                this.$notify({ type: 'success', title: 'Exito!', text: 'La Postulacion se ha actualizado correctamente' });
            }
        }
    }
});
