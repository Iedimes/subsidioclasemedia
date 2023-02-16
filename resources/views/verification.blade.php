<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>MUVH - VALIDACION CONSTANCIA</title>
  </head>
  <body>
      <div class="container">
          <img src="{{url('img/logofull.jpg')}}" class="img-fluid mx-auto d-block" alt="Image"/>
        @if (isset($task))
        <div class="card">
        <h5 class="card-header text-center">CONSTANCIA DE PRECALIFICACION AL SUBSIDIO</h5>
            <div class="card-body">
                <div class="card-body">
                    <h5 class="card-title text-center">BENEFICIARIO: {{ $task->name }} {{ $task->last_name }}</h5>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">DOCUMENTO: {{ number_format((int)$task->government_id,0,".",".") }}</li>
                    <li class="list-group-item">MONTO: {{ number_format((int)(($task->amount * $task->category->percentage) / 100),0,".",".")  }}</li>
                    <li class="list-group-item">FINCA: {{ $task->farm }}</li>
                    <li class="list-group-item">CTA CTE CTRAL: {{ $task->account }}</li>
                    <li class="list-group-item">CIUDAD: {{ strtoupper($task->city->CiuNom) }}</li>
                    <li class="list-group-item">DEPARTAMENTO: {{ $task->state->DptoNom }}</li>
                    <li class="list-group-item">FECHA EMISIÓN: {{ date('d/m/Y', strtotime($task->emitido->created_at))  }}</li>
                </ul>
                <div class="card-body">
                    <h5 class="card-title text-center">VALIDO 60 DIAS</h5>
                </div>
                <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->

            </div>
        </div>
        @else
            <div class="card">
                <h5 class="card-header text-center">No existe el registro</h5>
            </div>
        @endif

      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  </body>
</html>
