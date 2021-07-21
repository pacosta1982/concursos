import AppForm from '../app-components/Form/AppForm';

Vue.component('resume-form', {
    mixins: [AppForm],
    props: ['finddataurl'],
    data: function () {
        return {
            form: {
                names: 'PEDRO ALEJANDRO',
                last_names: 'ACOSTA MELO',
                government_id: '3496101',
                birthdate: '1982-05-10T00:00:00-04:00',
                gender: 'M',
                nationality: 'PARAGUAYA',
                address: '',
                neighborhood: '',
                phone: '',
                email: '',

            },
            datePickerConfig: {
                dateFormat: 'yyyy-MM-dd',
                altFormat: 'd-m-Y',
                noCalendar: true
            },
        }
    },
    methods: {
        findData: function () {

            let loader = this.$loading.show({
                canCancel: false,
            });

            /*axios.get(this.finddataurl + '/' + this.form.government_id + '/hadbenefit').then(
                (response) => {
                    if (response.data.error === false) {
                        if (parseInt(response.data.message.cod) === 1) {
                            loader.hide();
                            this.showModal();
                        }
                    } else {
                        this.$notify({ type: 'error', title: 'Error buscando beneficios', text: response.data.message });
                        loader.hide();
                    }
                });*/

            axios.get(this.finddataurl + '/' + this.form.government_id + '/identificaciones').then(
                (response) => {
                    loader.hide();
                    if (response.data.error === false) {
                        var data = response.data.message;
                        this.form.names = data.nombres;
                        this.form.last_names = data.apellido;
                        this.form.gender = data.sexo;
                        //this.form.marital_status = data.estadoCivil.trim();
                        this.form.nationality = data.nacionalidadBean;
                        var date = new Date(data.fechNacim);
                        this.form.birthdate = date.toISOString().split('T')[0];
                    } else {
                        loader.hide();
                        this.$notify({ type: 'error', title: 'Error buscando datos', text: response.data.message });
                    }
                })
        },
        onCancel: function () {
            console.log('User cancelled the loader.')
        }
    },

});
