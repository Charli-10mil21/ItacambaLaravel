@extends('layouts.plantillaPdf')

@section('title', 'Informe Planificacion')

@section('content') 

<p>Fecha Informe Generado:<strong>{{$fechaActual}}</strong> </p>

<h1> Volqueta {{$item->id}}</h1>
<p>Responsable: <strong>{{$item->responsable}}</strong></p>
<p>Placa: <strong>{{$item->placa}}</strong></p>
<p>Peso Tara: <strong>{{$item->pesoTara}}</strong></p>
<p>Area Designada: <strong>{{$item->area}} </strong>
<p>Estado: <strong>{{$item->estado}}</strong></p>
@foreach ($viajesTotal as $vi)
    <p>Viajes Totales: <strong>{{$vi->viajes_total}}</strong></p>
@endforeach
<h2>Descripcion Viajes realizados</h2>
<p>Nivel 145: <strong>{{$data}}</strong></p>
<p>Nivel 160: <strong>{{$data2}}</strong></p>
<p>Nivel 170: <strong>{{$data3}}</strong></p>
<p>Nivel 180: <strong>{{$data4}}</strong></p>
<p>Nivel 190: <strong>{{$data5}}</strong></p>

@endsection