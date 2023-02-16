@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applications.actions.transition'))

@section('body')






<div class="card">
    <div class="card-header">
        <div class="row">
           <div class="form-group col-sm-6">
               <p class="card-text">Modificar Descripcion Estado: {{ $id->status->name}}</p>
           </div>
       </div>
   </div>


        <application-status-form
            :action="'{{ url('admin/application-statuses/history') }}'"
            :task="{{$id}}"
            :data="{{ $id->toJson() }}"
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
