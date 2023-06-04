@extends('layouts.plantillaPdf')

@section('title', 'Informe Panel Central')


@section('content')

<h1>Reporte de Panel de Control</h1>
<div class="fila">
    <table>
        <thead>
            <tr>
                <th>Nombre Encargado</th>
                <th>Fecha</th>
                <th>Turno</th>
                <th>Horas Efectivas</th>
                <th>N° Volquetas</th>
                <th>N° Viajes</th>
                <th>Total Toneladas</th>
                <th>Balanza</th>
            </tr>
        </thead>
        <tbody>
            <tr>  
                @foreach($results as $re)
                <td>{{$re->nombre}}</td>
                <td>{{$re->fecha}}</td>
                <td>{{$re->Turno}}</td>
                <td>{{$re->HorasEfectivas}}</td>
                <td>{{$re->N_volquetas}}</td>
                <td>{{$re->N_viajes}}</td>
                <td>{{$re->toneladas_total}}</td>
                <td>{{$re->balanza}}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>


<div class="fila">
    <h3>Registro de viajes</h3>

    <table>
	    <thead>
	      <tr>
	       	<th>Nivel</th>
	        <th>Voladura</th>
	        <th>Nº Viajes</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($viajes as $vi)
            <tr>
                <td>{{$vi->nivel}}</td>
                <td>{{$vi->voladura}}</td>
                <td>{{$vi->n_viajes}}</td>
            </tr>
	    @endforeach()
	    </tbody>		     
	</table>
</div>

<div class="fila">
    <h3>Ocurrencias</h3>

    <table>
	    <thead>
	      <tr>
	       	<th>Detalle</th>
	        <th>Tipo de Parada</th>
	        <th>Hora Inicio</th>
            <th>Hora Fin</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($actividades as $ac)
            <tr>
                <td>{{$ac->detalle}}</td>
                @foreach ($paradas as $pa)
                    @if ($pa->id == $ac->parada_id)
                    <td>{{$pa->tipo}}</td>  
                    @endif
                @endforeach
                <td>{{$ac->horaIni}}</td>
                <td>{{$ac->horaFin}}</td> 
            </tr>
	    @endforeach()
	    </tbody>		     
	</table>
</div>

<div class="fila">
    <h3>Registro de Uso Maquinaria</h3>

    <table>
	    <thead>
	      <tr>
	       	<th>Maquinaria</th>
	        <th>Horas de Uso</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($usoMaquinarias as $uso)
            <tr>
                @foreach ($maquinarias as $maqui)
                    @if ($maqui->id == $uso->maquinaria_id)
                    <td>{{$maqui->codigo}}</td>
                    @endif
                @endforeach
                <td>{{$uso->horaUso}}</td> 
            </tr>
	    @endforeach()
	    </tbody>		     
	</table>
</div>

@endsection
