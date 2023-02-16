@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applications.actions.transition'))

@section('body')


<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Importante!</strong> <br>

    {{ $mensaje }}

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>



<div class="card">

<div class="card-header">
         <div class="row">
            <div class="form-group col-sm-6">
                <p class="card-text">Solicitante: {{ $task->name }} {{ $task->last_name }} - CI: {{ $task->government_id }}</p>
            </div>

            <div class="form-group col-sm-6">
                <p class="card-text">Expediente:  {{ $task->NroExp }}</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <p class="card-text">Estado Actual: <span class="badge" style="background-color: {{ $task->status->status->color }}; font-size:1.3em; color:white"> {{ $task->status->status->name }}</span></p>
            </div>

            <div class="form-group col-sm-6">
                <p class="card-text">Siguiente Estado: <span class="badge" style="background-color: {{ $workflowState->color }}; font-size:1.3em; color:white"> {{ $workflowState->name }}</span></p>
            </div>
        </div>

    </div>

        <application-status-form
            :action="'{{ url('admin/application-statuses') }}'"
            :task="{{$task->id}}"
            :status="{{$workflowState->id}}"
            :user="{{$user}}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-body">
                    @include('admin.application-status.components.form-elements')
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </application-status-form>

        </div>




@endsection
