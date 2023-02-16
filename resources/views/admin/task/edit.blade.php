@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.task.actions.edit', ['name' => $task->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <task-form-edit
                :action="'{{ url('admin/applications/'.$task->id) }}'"
                :data="{{ $task->toJson() }}"
                :workflow="{{ $workflow->toJson() }}"
                :category="{{ $category->toJson() }}"
                :state="{{ $state->toJson() }}"
                :city="{{ $city->toJson() }}"

                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.task.actions.edit', ['name' => $task->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.task.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </task-form-edit>

        </div>

</div>

@endsection
