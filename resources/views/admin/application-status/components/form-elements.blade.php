<!--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('task_id'), 'has-success': fields.task_id && fields.task_id.valid }">
    <label for="task_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application-status.columns.task_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.task_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('task_id'), 'form-control-success': fields.task_id && fields.task_id.valid}" id="task_id" name="task_id" placeholder="{{ trans('admin.application-status.columns.task_id') }}">
        <div v-if="errors.has('task_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('task_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status_id'), 'has-success': fields.status_id && fields.status_id.valid }">
    <label for="status_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application-status.columns.status_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.status_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('status_id'), 'form-control-success': fields.status_id && fields.status_id.valid}" id="status_id" name="status_id" placeholder="{{ trans('admin.application-status.columns.status_id') }}">
        <div v-if="errors.has('status_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user'), 'has-success': fields.user && fields.user.valid }">
    <label for="user" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application-status.columns.user') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user'), 'form-control-success': fields.user && fields.user.valid}" id="user" name="user" placeholder="{{ trans('admin.application-status.columns.user') }}">
        <div v-if="errors.has('user')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user') }}</div>
    </div>
</div>-->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application-status.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <textarea class="form-control" v-model="form.description"  id="description" name="description"></textarea>
        <!--<input type="text" v-model="form.description" v-validate="''" @input="validate($event)"
        class="form-control" :class="{'form-control-danger': errors.has('description'), 'form-control-success': fields.description && fields.description.valid}"
        id="description" name="description" placeholder="{{ trans('admin.application-status.columns.description') }}">-->
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>


