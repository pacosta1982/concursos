import AppListing from '../app-components/Listing/AppListing';

Vue.component('call-listing', {
    mixins: [AppListing],
    props: ['status'],
    created() {

        //this.property = 'Example property update.'

        //console.log('propertyComputed will update, as this.property is now reactive.')
        //this.pagination.state.per_page = 5
        this.$cookies.set("per_page",50);

      },
    mounted() {
        console.log(this.status);
        this.onSuccess();
    },
    methods: {
        onSuccess() {

            if (this.status == 'success') {
                this.$notify({ type: 'success', title: 'Success!', text: 'This is notification test.' });
            }
            if (this.status == 'error') {
                this.$notify({ type: 'error', title: 'Error!', text: 'Ya se ha Postulado para esta convocatoria.' });
            }
        }
    }
});



