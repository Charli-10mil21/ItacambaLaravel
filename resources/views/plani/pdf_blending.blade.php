  <table >
    <thead style="background-color: #94b43b">
      <tr>
        <th >#id</th>
       	<th >Codigo Produccion</th>
       	<th >Fecha</th>
   		<th >FSC</th>
   		<th >MS</th>
   		<th >MA</th>
   		<th >Toneladas Totales</th>
   		<th >Viajes</th>
        <th >Planificacion</th>
        <th >Nivel Topografico</th>
      </tr>
    </thead>
    <tbody>
     
      <tr>
        <th>{{$items->id}}</th>
        <td>{{$items->codigo}}</td>
        <td>{{$items->fecha}}</td>
        <td>{{$items->fsc}}</td>
        <td>{{$items->ms}}</td>
        <td>{{$items->ma}}</td>
        <td>{{$items->toneladas}}</td>
        <td>{{$items->viajes}}</td>
        <td>{{$items->planificacion_id}}</td>
      </tr>
    </tbody>
  </table>

  <div>
	<h3>Planificacion</h3>
	<table>
	    <thead style="background-color: #94b43b">
	      <tr>
	        <th >#id</th>
	        <th >Nombre</th>
	        <th >Presupuesto</th>
	        <th >Produccion</th>
	        <th >Fecha Inicio</th>
	        <th >Fecha fin</th>
	        <th >Duracion</th>
	        <th >Usuario</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	        <th >{{$plani->id}}</th>
	        <td>{{$plani->name}}</td>
	        <td>{{$plani->presupuesto}}</td>
	        <td>{{$plani->produccion}}</td>
	        <td>{{$plani->fechaIni}}</td>
	        <td>{{$plani->fechaFin}}</td>
	        <td>{{$plani->duracion}}</td>
	        <td>{{$plani->user_id}}</td>
	      </tr>
	    </tbody>
	  </table>
</div>

<h3>Nivel Topografico</h3>
<div>
		<table>
	    <thead style="background-color: #94b43b">
	      <tr>
	        <th>#id</th>
	       	<th>Nivel</th>
	       	<th>Levantamiento de Puntos</th>
	        <th>Replanteammiento de Puntos</th>
	        
	      </tr>
	    </thead>
	    <tbody>
		      <tr>
		        <th>{{$topografia->id}}</th>
		        <td>{{$topografia->area}}</td>
		        <td>{{$topografia->levPuntos}}</td>
		        <td>{{$topografia->replanPuntos}}</td>
		      </tr>
	    </tbody>
	  </table>				 	
	</div>

	<h1>Informes de Laboratorio</h1>
		<div >
		  <table>
		    <thead style="background-color: #94b43b">
		      <tr>
		        <th >#id</th>
		       	<th >Fecha</th>
		       	<th >Magnesio</th>			       	
		       	<th >Hierro</th>
		       	<th >Silicio</th>
		       	<th >Aluminio</th>
		       	<th >Calcio</th>
		       	<th >Destino</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($laboratorios as $lab)
		      <tr>
		        <th>{{$lab->id}}</th>
		        <td>{{$lab->fecha}}</td>
		        <td>{{$lab->mg}}</td>
		        <td>{{$lab->fe}}</td>					        
		        <td>{{$lab->si}}</td>
		        <td>{{$lab->al}}</td>
		        <td>{{$lab->ca}}</td>
		        <td>{{$lab->destino}}</td>				        
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  
		</div>