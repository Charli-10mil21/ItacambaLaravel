@extends('layouts.plantilla')

@section('title', 'Informe Produccion')


@section('content')
<div class="container py-4">
	<div class="row my-4">
        <div class="col-md-6">
            <div id="app">
                {!! $chart->container() !!}
            </div>
        </div>
        <div class="col-md-6">
            @foreach ($produccionTotal as $pro)
            <div class="row py-5">
                <div class="col-md-6">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h3 class="card-title">Produccion Total Tn</h3>
                          <p class="card-text">{{$pro->toneladas_totales}}</p>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h3 class="card-title">Productividad</h3>
                          
                          <p class="card-text">{{$pro->productividad}}</p>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h3 class="card-title">Horas Total Trabajadas </h3>
                          <p class="card-text">{{$pro->horas_trabajadas_totales}}</p>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h3 class="card-title">Horas Total Efectivas </h3>
                          <p class="card-text">{{$pro->horas_efectivas_totales}}</p>
                        </div>
                      </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
	<div>
		@livewire('filtros-informes-pro')
	</div>
	
</div>
{!! $chart->script() !!}
@endsection