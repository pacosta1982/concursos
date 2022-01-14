import AppForm from '../app-components/Form/AppForm';

Vue.component('resume-form', {
    mixins: [AppForm],
    props: ['finddataurl','state','city'],
    data: function () {
        return {
            form: {
                names: '',
                last_names: '',
                government_id: '',
                birthdate: '',
                gender: '',
                nationality: '',
                address: '',
                state: '',
                city: '',
                neighborhood: '',
                phone: '',
                email: '',
                created_by: '',

            },
            cities: [],
            datePickerConfig: {
                dateFormat: 'yyyy-MM-dd',
                altFormat: 'd-m-Y',
                noCalendar: true
            },
        }
    },
    methods: {
        onchangeDpto: function (selectedItems) {

            axios
                .get('/resume/' + selectedItems.DptoId + '/cities')
                .then(response => {
                    console.log(response.data)
                    this.form.city = ''
                    this.cities = response.data

                })
                .catch(function (error) {
                    console.log(error);
                })
            //console.log(selectedItems.DptoId)
        },
        findData: function () {

            //console.log(this.form.government_id)
            let loader = this.$loading.show({
                canCancel: false,
            })
            axios
                .get(this.finddataurl + '/' + this.form.government_id + '/identificaciones')
                .then(response => {
                    console.log(response.data)
                    if (!response.data.error) {
                        loader.hide();
                        console.log('funciona')
                        this.form.names = response.data.message.nombres;
                        this.form.last_names = response.data.message.apellido;
                        this.form.gender = response.data.message.sexo;
                        this.form.nationality = response.data.message.nacionalidadBean;
                        this.form.birthdate = response.data.message.fechNacim;
                        //var date = new Date(response.data.message.fechNacim);
                        //this.form.birthdate = date.toISOString().split('T')[0];
                    } else {
                        loader.hide();
                        console.log('No funciona')
                    }
                })
                .catch(function (error) {
                    loader.hide();
                    console.log(error);
                    this.form.names = '';
                    this.form.last_names = '';
                    this.form.gender = '';
                    this.form.nationality = '';
                    //loader.hide();
                    this.$notify({ type: 'error', title: 'Error buscando datos', text: error });
                })
            /*let loader = this.$loading.show({
                canCancel: false,
            });*/

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

            /*axios.get(this.finddataurl + '/' + this.form.government_id + '/identificaciones').then(
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
                }).catch(function (error) {
                    //console.log(error);
                    loader.hide();
                    //this.$notify({ type: 'error', title: 'Error buscando datos', text: 'abc' });
                })*/
        },
        onCancel: function () {
            console.log('User cancelled the loader.')
        }
    },

});
