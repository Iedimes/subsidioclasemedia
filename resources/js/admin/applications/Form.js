import AppForm from '../app-components/Form/AppForm';

Vue.component('visit-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                project_id:  '' ,
                visit_number:  '' ,
                advance:  '' ,
                visit_date:  '' ,

            },
            mediaCollections: ['gallery']
        }
    }

});
