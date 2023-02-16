<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.workflow-state.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.workflow-state.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('color'), 'has-success': fields.color && fields.color.valid }">
    <label for="color" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.workflow-state.columns.color') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!--<input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control"
        :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name"
        name="name" placeholder="{{ trans('admin.workflow-state.columns.name') }}">-->
        <input type="color" v-model="form.color" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('color'), 'form-control-success': fields.color && fields.color.valid}" id="color" name="color" placeholder="{{ trans('admin.workflow-state.columns.color') }}">
        <div v-if="errors.has('color')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('color') }}</div>
    </div>
</div>

<!--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('workflow_id'), 'has-success': fields.workflow_id && fields.workflow_id.valid }">
    <label for="workflow_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.workflow-state.columns.workflow_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.workflow_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('workflow_id'), 'form-control-success': fields.workflow_id && fields.workflow_id.valid}" id="workflow_id" name="workflow_id" placeholder="{{ trans('admin.workflow-state.columns.workflow_id') }}">
        <div v-if="errors.has('workflow_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('workflow_id') }}</div>
    </div>
</div>-->

<div class="form-check row" :class="{'has-danger': errors.has('isactive'), 'has-success': fields.isactive && fields.isactive.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="isactive" type="checkbox" v-model="form.isactive" v-validate="''" data-vv-name="isactive"  name="isactive_fake_element">
        <label class="form-check-label" for="isactive">
            {{ trans('admin.workflow-state.columns.isactive') }}
        </label>
        <input type="hidden" name="isactive" :value="form.isactive">
        <div v-if="errors.has('isactive')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('isactive') }}</div>
    </div>
</div>


