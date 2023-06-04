<h1>Reporte de Produccion {{$items->fecha}}</h1>
<br>
<div>
    <table>
        <thead>
            <tr>
            <th>#id</th>
            <th>Fecha</th> 
            <th>Blending</th> 	     	
            <th>Total Viajes</th>
            <th>Horas Trabajadas</th>
            <th>Horas Efectivas</th> 
            <th>Produccion</th>
            <th>Productividad</th>
            <th>Balanza Total</th>   
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{$items->id}}</th>
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
            </tr>
        </tbody>
    </table>
</div>
        
 <br>
    <h2>Detalle de Turnos</h2>

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