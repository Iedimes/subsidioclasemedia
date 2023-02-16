<!--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('NroExpS'), 'has-success': fields.NroExpS && fields.NroExpS.valid }">
    <label for="NroExpS" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.NroExpS') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.NroExpS" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('NroExpS'), 'form-control-success': fields.NroExpS && fields.NroExpS.valid}" id="NroExpS" name="NroExpS" placeholder="{{ trans('admin.task.columns.NroExpS') }}">
        <div v-if="errors.has('NroExpS')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('NroExpS') }}</div>
    </div>
</div>-->
<!-- Titular -->
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" value="something" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.task.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_name'), 'has-success': fields.last_name && fields.last_name.valid }">
    <label for="last_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.last_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.last_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('last_name'), 'form-control-success': fields.last_name && fields.last_name.valid}" id="last_name" name="last_name" placeholder="{{ trans('admin.task.columns.last_name') }}">
        <div v-if="errors.has('last_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('government_id'), 'has-success': fields.government_id && fields.government_id.valid }">
    <label for="government_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.government_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.government_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('government_id'), 'form-control-success': fields.government_id && fields.government_id.valid}" id="government_id" name="government_id" placeholder="{{ trans('admin.task.columns.government_id') }}">
        <div v-if="errors.has('government_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('government_id') }}</div>
    </div>
</div>

<!-- Conyuge -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name_couple'), 'has-success': fields.name_couple && fields.name_couple.valid }">
    <label for="name_couple" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.name_couple') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name_couple" value="something"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name_couple'), 'form-control-success': fields.name_couple && fields.name_couple.valid}" id="name_couple" name="name_couple" placeholder="{{ trans('admin.task.columns.name_couple') }}">
        <div v-if="errors.has('name_couple')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name_couple') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_name_couple'), 'has-success': fields.last_name_couple && fields.last_name_couple.valid }">
    <label for="last_name_couple" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.last_name_couple') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.last_name_couple"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('last_name_couple'), 'form-control-success': fields.last_name_couple && fields.last_name_couple.valid}" id="last_name_couple" name="last_name_couple" placeholder="{{ trans('admin.task.columns.last_name_couple') }}">
        <div v-if="errors.has('last_name_couple')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_name_couple') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('government_id_couple'), 'has-success': fields.government_id_couple && fields.government_id_couple.valid }">
    <label for="government_id_couple" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.government_id_couple') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.government_id_couple"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('government_id_couple'), 'form-control-success': fields.government_id_couple && fields.government_id_couple.valid}" id="government_id_couple" name="government_id_couple" placeholder="{{ trans('admin.task.columns.government_id_couple') }}">
        <div v-if="errors.has('government_id_couple')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('government_id_couple') }}</div>
    </div>
</div>

<!-- -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('state_id'), 'has-success': fields.state_id && fields.state_id.valid }">
    <label for="state_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.state_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
            v-model="form.state"
            :options="state"
            :multiple="false"
            track-by="DptoId"
            label="DptoNom"
            :taggable="true"
            tag-placeholder=""
            @select="onchangeDpto"
            placeholder="{{ trans('admin.applications.columns.state') }}">
            </multiselect>
        <!--<input type="text" v-model="form.state_id" v-validate="'required'" @input="validate($event)"
        class="form-control" :class="{'form-control-danger': errors.has('state_id'), 'form-control-success': fields.state_id && fields.state_id.valid}"
        id="state_id" name="state_id" placeholder="{{ trans('admin.task.columns.state_id') }}">-->
        <div v-if="errors.has('state_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('state_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('city_id'), 'has-success': fields.city_id && fields.city_id.valid }">
    <label for="city_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.city_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
            v-model="form.city"
            :options="cities"
            :multiple="false"
            track-by="CiuId"
            label="CiuNom"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.applications.columns.city') }}">
        </multiselect>
        <!--<input type="text" v-model="form.city_id" v-validate="'required'" @input="validate($event)"
        class="form-control" :class="{'form-control-danger': errors.has('city_id'), 'form-control-success': fields.city_id && fields.city_id.valid}"
        id="city_id" name="city_id" placeholder="{{ trans('admin.task.columns.city_id') }}">-->
        <div v-if="errors.has('city_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('city_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('farm'), 'has-success': fields.farm && fields.farm.valid }">
    <label for="farm" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.farm') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.farm"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('farm'), 'form-control-success': fields.farm && fields.farm.valid}" id="farm" name="farm" placeholder="{{ trans('admin.task.columns.farm') }}">
        <div v-if="errors.has('farm')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('farm') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('account'), 'has-success': fields.account && fields.account.valid }">
    <label for="account" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.account') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.account"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('account'), 'form-control-success': fields.account && fields.account.valid}" id="account" name="account" placeholder="{{ trans('admin.task.columns.account') }}">
        <div v-if="errors.has('account')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('account') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('amount'), 'has-success': fields.amount && fields.amount.valid }">
    <label for="amount" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.amount') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.amount" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('amount'), 'form-control-success': fields.amount && fields.amount.valid}" id="amount" name="amount" placeholder="{{ trans('admin.task.columns.amount') }}">
        <div v-if="errors.has('amount')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('amount') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('workflow'), 'has-success': fields.workflow && fields.workflow.valid }">
    <label for="workflow_state_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.workflow_state_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.workflow"
            :options="workflow"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.application.columns.workflow') }}">
        </multiselect>
        <!--<input type="text" v-model="form.workflow_state_id" v-validate="'required'" @input="validate($event)"
        class="form-control" :class="{'form-control-danger': errors.has('workflow_state_id'), 'form-control-success': fields.workflow_state_id && fields.workflow_state_id.valid}"
        id="workflow_state_id" name="workflow_state_id" placeholder="{{ trans('admin.task.columns.workflow_state_id') }}">-->
        <div v-if="errors.has('workflow')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('workflow') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('category'), 'has-success': fields.category && fields.category.valid }">
    <label for="category" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.category') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.category"
            :options="category"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.application.columns.category') }}">
        </multiselect>
        <!--<input type="text" v-model="form.workflow_state_id" v-validate="'required'" @input="validate($event)"
        class="form-control" :class="{'form-control-danger': errors.has('workflow_state_id'), 'form-control-success': fields.workflow_state_id && fields.workflow_state_id.valid}"
        id="workflow_state_id" name="workflow_state_id" placeholder="{{ trans('admin.task.columns.workflow_state_id') }}">-->
        <div v-if="errors.has('category')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('category') }}</div>
    </div>
</div>


