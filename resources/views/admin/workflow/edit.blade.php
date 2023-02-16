@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.workflow.actions.edit', ['name' => $workflow->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <workflow-form
                :action="'{{ $workflow->resource_url }}'"
                :data="{{ $workflow->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.workflow.actions.edit', ['name' => $workflow->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.workflow.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </workflow-form>

        </div>
    
</div>

@endsection