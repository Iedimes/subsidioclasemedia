<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('workflow_state_id'), 'has-success': fields.workflow_state_id && fields.workflow_state_id.valid }">
    <label for="workflow_state_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.workflow-navigation.columns.workflow_state_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.workflow_state_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('workflow_state_id'), 'form-control-success': fields.workflow_state_id && fields.workflow_state_id.valid}" id="workflow_state_id" name="workflow_state_id" placeholder="{{ trans('admin.workflow-navigation.columns.workflow_state_id') }}">
        <div v-if="errors.has('workflow_state_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('workflow_state_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('next_workflow_state_id'), 'has-success': fields.next_workflow_state_id && fields.next_workflow_state_id.valid }">
    <label for="next_workflow_state_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.workflow-navigation.columns.next_workflow_state_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!--<input type="text" v-model="form.next_workflow_state_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('next_workflow_state_id'), 'form-control-success': fields.next_workflow_state_id && fields.next_workflow_state_id.valid}" id="next_workflow_state_id" name="next_workflow_state_id" placeholder="{{ trans('admin.workflow-navigation.columns.next_workflow_state_id') }}">-->
        <multiselect
            v-model="form.next_workflow_state_id"
            :options="states"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.workflowstate.actions.search')  }}">
        </multiselect>
        <div v-if="errors.has('next_workflow_state_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('next_workflow_state_id') }}</div>
    </div>
</div>


