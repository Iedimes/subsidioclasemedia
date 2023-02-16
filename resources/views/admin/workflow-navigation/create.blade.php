@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.workflow-navigation.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <workflow-navigation-form
            :action="'{{ url('admin/workflow-navigations') }}'"
            :workflow_state="{{$workflowState->id}}"
            :states="{{$states}}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.workflow-navigation.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.workflow-navigation.components.form-elements')
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </workflow-navigation-form>

        </div>

        </div>


@endsection
