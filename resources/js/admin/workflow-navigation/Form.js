import AppForm from '../app-components/Form/AppForm';

Vue.component('workflow-navigation-form', {
    mixins: [AppForm],
    props: ["workflow_state", "states"],
    data: function() {
        return {
            form: {
                workflow_state_id:  this.workflow_state,
                next_workflow_state_id:  '' ,

            }
        }
    }

});
