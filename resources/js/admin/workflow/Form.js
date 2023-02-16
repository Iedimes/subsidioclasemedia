import AppForm from '../app-components/Form/AppForm';

Vue.component('workflow-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});