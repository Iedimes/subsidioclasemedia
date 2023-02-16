import AppForm from '../app-components/Form/AppForm';

Vue.component('application-status-form', {
    mixins: [AppForm],
    props: ["task", "status","user"],
    data: function() {
        return {
            form: {
                task_id:  this.task,
                status_id:  this.status ,
                user_id:  this.user ,
                description:  '' ,

            }
        }
    }

});
