@extends('layouts.plantilla')

@section('title', 'Informe Produccion')


@section('content')
<div class="container py-4">
    <h1>Estado General de la Mina</h1>
    <div class="row my-4">
        <div class="col-md-12">
            <div id="app">
                {!! $chart->container() !!}
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-6">
            <h1> Resumen Area Planificacion</h1>
                <div class="row my-4">
                    <div class="card text-center" >
                        <div class="card-body">
                        <h3 class="card-title">Presupuesto Total </h3>
                        <p class="card-text">{{$presuTotal}}</p>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="card text-center" >
                        <div class="card-body">
                        <h3 class="card-title">Toneladas Total </h3>
                        <p class="card-text">{{$toneladasTotal}}</p>
                        </div>
                    </div>
                </div>
           
        </div>
        <div class="col-md-6">
            <h1>Resumen Area Produccion</h1>
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h3 class="card-title">Produccion Total Tn</h3>
                          <p class="card-text">{{$toneladas_totales}}</p>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h3 class="card-title">Horas Total Trabajadas </h3>
                          <p class="card-text">{{$horas_trabajadas_totales}}</p>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h3 class="card-title">Horas Total Efectivas </h3>
                          <p class="card-text">{{$horas_efectivas_totales}}</p>
                        </div>
                      </div>
                </div>
            </div>
            
        </div>

    </div>
	<div>
</div>
{!! $chart->script() !!}
@endsection