import AppForm from '../app-components/Form/AppForm';

Vue.component('task-form', {
    mixins: [AppForm],
    props: ['workflow','expediente','application','state','city','category'],
    data: function() {
        return {
            form: {
                NroExp:  this.expediente,
                name:  this.application.NroExpsol ,
                last_name:  '' ,
                government_id: this.application.NroExpPer,
                name_couple: '',
                last_name_couple: '',
                government_id_couple: '',
                state: '',
                city: '',
                farm:  '' ,
                account:  '' ,
                amount: '',
                category: '',
                workflow:  '' ,

            },
            cities: [],
        }
    },
    methods: {
        onchangeDpto: function (selectedItems) {

            axios
                .get('/admin/applications/' + selectedItems.DptoId + '/cities')
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
    },
    mounted() {
        console.log(this.application)
    },

});

Vue.component('task-form-edit', {
    mixins: [AppForm],
    props: ['state','city','workflow','category'],
    data: function() {
        return {
            form: {
                NroExp:  '',
                name:  '',
                last_name:  '' ,
                government_id: '',
                name_couple: '',
                last_name_couple: '',
                government_id_couple: '',
                state: '',
                city: '',
                farm:  '' ,
                account:  '' ,
                amount:  '' ,
                workflow: '',
                category: '',

            },
            cities: [],
        }
    },
    methods: {
        onchangeDpto: function (selectedItems) {

            axios
                .get('/admin/applications/' + selectedItems.DptoId + '/cities')
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
    },
    mounted() {
        //console.log(this.application)
    },

});
