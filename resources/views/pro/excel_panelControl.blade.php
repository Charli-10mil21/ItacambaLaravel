
    <table>
        <thead>
            <tr>
                <th style="background-color: rgb(29,86,153)">Nombre Encargado</th>
                <th style="background-color: rgb(29,86,153)">Fecha</th>
                <th style="background-color: rgb(29,86,153)">Turno</th>
                <th style="background-color: rgb(29,86,153)">Horas Efectivas</th>
                <th style="background-color: rgb(29,86,153)">N° Volquetas</th>
                <th style="background-color: rgb(29,86,153)">N° Viajes</th>
                <th style="background-color: rgb(29,86,153)">Total Toneladas</th>
                <th style="background-color: rgb(29,86,153)">Balanza</th>
            </tr>
        </thead>
        <tbody >
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
    