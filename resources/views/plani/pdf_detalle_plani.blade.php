@extends('layouts.plantillaPdf')

@section('title', 'Informe Planificacion')

@section('content') 

<p>Fecha Informe Generado:<strong>{{$fechaActual}}</strong> </p>
<h1> Planificacion {{$item->name}}</h1>
<p>Encargado: <strong>{{$item->user->nombre}} {{$item->user->apellido}}</strong></p>
<p>Presupuesto: <strong>{{$item->presupuesto}}</strong></p>
<p>Produccion: <strong>{{$item->produccion}}</strong></p>
<p>Fecha Inicio: <strong>{{$item->fechaIni}} </strong> Fecha Final : <strong>{{$item->fechaFin}}</strong></p>
<p>Toneladas Totales: <strong>{{$item->toneladas_t}}</strong></p>
<p>Total de Viajes Volquetas <strong>{{$item->viajes_t}}</strong></p>

        <h3>Blendings</h3>
        <table >
            <thead>
                <tr>
                <th scope="col">#id</th>
                <th scope="col">Codigo Produccion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col2">FSC</th>
                <th scope="col2">MS</th>
                <th scope="col2">MA</th>
                <th scope="col2">Toneladas Totales</th>
                <th scope="col2">Viajes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blendings as $blen)
                <tr>
                <th >{{$blen->id}}</th>
                <td>{{$blen->codigo}}</td>
                <td>{{$blen->fecha}}</td>
                <td>{{$blen->estado}}</td>
                <td>{{$blen->FSC_total}}</td>
                <td>{{$blen->MS_total}}</td>
                <td>{{$blen->MA_total}}</td>
                <td>{{$blen->toneladas_total}}</td>
                <td>{{$blen->viajes_total}}</td>
                </tr>
                @endforeach()
            </tbody>
        </table>



@endsection