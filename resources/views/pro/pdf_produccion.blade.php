@extends('layouts.plantillaPdf')

@section('title', 'Informe Produccion')


@section('content')

    <h1>Reporte de Produccion {{$items->fecha}}</h1>

    <div class="fila">
        <table>
            <thead>
                <tr>
                <th scope="col">#id</th>
                <th scope="col">Fecha</th> 
                <th scope="col">Blending</th> 	     	
                <th scope="col">Total Viajes</th>
                <th scope="col">Horas Trabajadas</th>
                <th scope="col">Horas Efectivas</th> 
                <th scope="col">Produccion</th>
                <th scope="col">Productividad</th>
                <th scope="col">Balanza Total</th>   
                </tr>
            </thead>
            <tbody>
                <th >{{$items->id}}</th>
                <td>{{$items->fecha}}</td>
                <td>
                    @foreach($blendings as $ble)
                    @if($items->blending_id == $ble->id)
                    {{$ble->codigo}}
                    @endif
                    @endforeach
                </td>
                <td>{{$items->T_viajes}}</td>
                <td>{{$items->T_horas}}</td>
                <td>{{$items->H_efectivas}}</td>
                <td>{{$items->T_produccion}}</td>
                <td>{{$items->productividad}}</td>
                <td>{{$items->T_balanza}}</td>
            </tbody>
        </table>
    </div>

    <h2>Detalle de Turnos</h2>
    <div class="fila">
        <table>
        <thead>
            <tr>
            <th>Nombre Encargado</th>
            <th>Turno</th>
            <th>Hora Inicio</th>
            <th>Hora Final</th>
            <th>Horas Total</th>					       	
            <th>Horas Efectivas</th>	        
            <th>Nº Volquetas</th>
            <th>Viajes total</th>
            <th>Toneladas</th>		        
            <th>Balanza Integrada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paneles as $pan)
                <tr>
                <td>{{$pan->nombre}}</td>
                <td>
                    @foreach($turnos as $turno)
                        @if($pan->turno_id == $turno->id)
                        {{$turno->name}}
                        @endif
                    @endforeach()
                </td>
                <td>{{$pan->HoraIni}}</td>
                <td>{{$pan->HoraFin}}</td>
                <td>{{$pan->HorasT}}</td>
                <td>{{$pan->HorasEfectivas}}</td>
                <td>{{$pan->N_volquetas}}</td>
                <td>{{$pan->N_viajes}}</td>
                <td>{{$pan->toneladas_total}}</td>
                <td>{{$pan->balanza}}</td>
                </tr>
            @endforeach()
        </tbody>
        </table>
    </div>

    <div class="firmas">
        <div>
            <p>------------------</p>
        </div>
        <div class="caja">
            <p>Jefe de Produccion</p>
        </div>
    </div>
@endsection