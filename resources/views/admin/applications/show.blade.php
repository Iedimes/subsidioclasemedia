@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applications.actions.show'))

@section('body')

@if ($sol)

<div class="card">
    <div class="card-header text-center">
         DATOS DE LA SOLICITUD
         @if ($sol->status->status->id == 1 || $sol->status->status->id == 22 || $sol->status->status->id == 26)
         <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/applications/'.$application->NroExp.'/'.$sol->id.'/edit') }}" role="button"><i class="fa fa-edit"></i>&nbsp; Editar</a>
         @endif
             </div>

    <div class="card-body">

        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Solicitante:</strong> {{ $sol->name }} {{ $sol->last_name }}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Documento:</strong> {{ number_format((int)$sol->government_id,0,".",".") }}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Expediente:</strong>  {{ $sol->NroExp }}</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Conyuge:</strong> {{ $sol->name_couple }} {{ $sol->last_name_couple }}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Documento:</strong> {{ number_format((int)$sol->government_id_couple,0,".",".") }}</p>
            </div>
            <div class="form-group col-sm-4">

                <p class="card-text"><strong>Finca:</strong> {{ $sol->farm }}</p>

            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Departamento:</strong> {{ $sol->state->DptoNom }}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Ciudad:</strong> {{ $sol->city->CiuNom }}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Cuenta Cte Ctral:</strong>  {{ $sol->account }}</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Categoria:</strong> {{ $sol->category->name }}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Monto Total:</strong> {{ number_format((int)$sol->amount,0,".",".") }}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>Monto Subsidio:</strong>  {{ number_format((int)(($sol->amount * $sol->category->percentage) / 100),0,".",".")  }}</p>
            </div>
        </div>
        <div class="row">


            <div class="form-group col-sm-4" >
                <p class="card-text"><strong>Estado:</strong>   <span class="badge" style="background-color: {{ $sol->status->status->color }}; font-size:1.3em; color:white"> {{ $sol->status->status->name }}</span></p>
            </div>
        </div>
        @if ($sol->status->status->id == 14 || $sol->status->status->id == 26)
           <div class="row">
                <div class="form-group col-sm-4">
                    <p class="card-text"><a href="{{ url('admin/applications/'.$sol->id.'/pdf') }}" class="btn btn-block btn-square btn-lg text-white bg-danger"><i class="fa fa-file-pdf-o"></i> Imprimir Certificado</a></p>
                </div>
            </div>
        @endif

    </div>
  </div>

  <div class="card">
    <div class="card-body text-center">
        <h4>OPCIONES DISPONIBLES</h4>
         <div class="row">
            @foreach ($navegacion as $item)
                <div class="col">
                    <a href="{{ url('admin/applications/'.$sol->id.'/'.$item->next->id.'/transition') }}" type="button" style="background-color: {{ $item->next->color }}; color:white; font-weight: bold; " class="btn btn-square  btn-lg btn-block">{{ $item->next->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
  </div>

   <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.applications.history') }}
                    </div>
                    <div class="card-body" v-cloak>
                        <!--<div class="card-block">-->
                            <table class="table table-sm table-hover table-borderless">
                                <thead>
                                    <tr>
                                    <th class="d-none d-sm-block">#</th>
                                    <th>{{ trans('admin.applications.columns.status') }}</th>
                                    <th>{{ trans('admin.applications.columns.date') }}</th>
                                    <th>{{ trans('admin.applications.columns.user') }}</th>
                                    <th>{{ trans('admin.applications.columns.description') }}</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historial as $key=>$item)
                                    <tr>
                                    <th class="d-none d-sm-block" scope="row">{{$item->id}}</th>
                                    <td>{{$item->status->name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->user->first_name}} {{$item->user->last_name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" href="{{ url('admin/applications/history/'.$item->id) }}" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                            </div>

                                        </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                    </div>
                </div>
            </div>
        </div>

@else
<div class="card">
    <div class="card-header text-center">
         SOLICITANTE: {{ $application->NroExpsol }}
          <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url()->previous() }}" role="button"><i class="fa fa-undo"></i>&nbsp; {{ trans('admin.guest.actions.back') }}</a>
    </div>

    <div class="card-body">
        <a href="{{ url('admin/applications/'.$application->NroExp.'/create') }}" class="btn btn-block btn-square btn-lg bg-primary"><i class="fa fa-plus"></i><strong> Procesar Solicitud</strong></a>
    </div>
  </div>

@endif

@endsection
