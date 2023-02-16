<!DOCTYPE html>
<html>
<head>
    <title>CONSTANCIA DE PRECALIFICACIÓN</title>
    <style>
            /** Define the header rules **/
    .cabeceraimagen {
        position: fixed;
        top: 0cm;
        left: 2cm;
        right: 0cm;
        height: 3cm;
    }


    body {
                margin-top: 2cm;
                border-color: #0e3d80;
                border-width: 1em

            }

    #cabecera {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size: x-small;
    }

    #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    .center{
    text-align:center;
    }

    .right{
        text-align: right;
    }

    #customers td, #customers th {
    border: 1px solid #DDDDDD;
    font-size: x-small;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #fff;}


    #customers tr:hover {
        background-color: #DDD;
        }

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    font-size: x-small;
    background-color: #0e3d80;
    color: white;
    }
    </style>
</head>
<body>
        <script type="text/php">
            if (isset($pdf)) {
              $font = $fontMetrics->getFont("Arial", "bold");
              $today = date("d/m/Y h:i:s");
              $pdf->page_text(535, 760, "Pagina {PAGE_NUM}", $font, 10, array(0, 0, 0));
              $pdf->page_text(40, 760, "Fecha de Impresión: {$today}", $font, 10, array(0, 0, 0));
            }
          </script>
    <div class="cabeceraimagen">
        <img src="{{public_path('img/logofull.jpg')}}"  width="500"      >
    </div>
    <br>
    <br>
    <h4 class="center">CONSTANCIA DE PRECALIFICACIÓN AL APORTE ESTATAL EN EL MARCO DE LA LEY N° 5638/16</h4>
    <p>
        El Ministerio de Urbanismo, Vivienda y Hábitat emite la presente Constancia de Precalificación al Aporte Estatal a
        nombre del/la señor/a <strong> {{ strtoupper($task->name.' '.$task->last_name) }} </strong> con C.I.C. N° <strong> {{ number_format((int)$task->government_id,0,".",".") }} </strong>


        @if ($task->name_couple)
             y su cónyuge/concubino <strong> {{ strtoupper($task->name_couple.' '.$task->last_name_couple) }} </strong>  con C.I.C N° <strong> {{ number_format((int)$task->government_id_couple,0,".",".") }} </strong>, respectivamente
        @endif
        , en el marco de la Ley N° 5638/16, sus decretos y sus reglamentaciones.
    </p>
    <p>
        El Aporte Estatal a ser eventualmente otorgado corresponde a la Categoría <strong> {{ $task->category->name }} </strong>, el cual asciende a la suma de Gs <strong> {{ number_format((int)(($task->amount * $task->category->percentage) / 100),0,".",".")  }} </strong>, equivalente al
       <strong> {{$task->category->percentage}} % </strong> de monto total de la Carta Oferta recibida en relación con el inmueble individualizado como
       @if ($task->farm)
       Finca o Matrícula N° <strong> {{ $task->farm }} </strong>
       @endif
       Cta. Cte. Ctral N° <strong> {{ $task->account }} </strong>

        del distrito de <strong> {{ $task->city->CiuNom }} </strong> del Departamento de <strong>{{ ucwords(strtolower($task->state->DptoNom))  }} </strong>
    </p>
    <p>
        La presente tendrá una validez de 60 días contados desde la emisión para su
        presentación ante la IFI, en caso de que el crédito complementario sea rechazado y
        haya transcurrido el plazo antes señalado, el presente instrumento quedará sin efecto.
    </p>
    <p>
        El desembolso del Aporte Estatal estará sujeto a la efectiva presentación del informe de
        No Poseer Inmueble correspondiente a él/los postulantes y su grupo familiar mayor de edad y a la
        aprobación del crédito complementario por parte de la IFI.
    </p>
    <p>
        El canje, adulteración o modificación del presente instrumento, conllevará la nulidad de este,
        sin otro trámite al efecto
    </p>
@php
    $date = \Carbon\Carbon::parse($task->status->created_at);
@endphp
    <p class="right">
        Asuncion, {{ date('d',strtotime($task->status->created_at)) }} de {{ $date->formatLocalized('%B') }} de {{ date('Y',strtotime($task->status->created_at)) }}
    </p>

    <img src="data:image/png;base64, {{ base64_encode($valor) }}" alt="">


</body>

</html>
