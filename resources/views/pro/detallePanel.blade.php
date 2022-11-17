@extends('layouts.plantillaProduccion')

@section('title', 'Panel'. $item->turno)

@section('content')
<div class="container py-4">

	<div class="row text-center">
		<h1>Panel de Control</h1>
	</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
	<div class="row">
		<form class="row form m-3 needs-validation" action="{{route('paneles.update', $item->id)}}" method="post">
		@csrf 
		@method('put')
			<div class="col-md-6">
		    	<label for="fecha" class="form-label">Fecha</label>
		    	<input type="text" class="form-control" id="fecha" name="fecha" value="{{$item->fecha}}" required>
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-6">
		    	<label for="nombre" class="form-label">Nombre</label>
		    	<input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->nombre}}" required>
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-6">
		    	<label for="blending_id" class="form-label">Blending</label>
		    	<input type="text" class="form-control" id="blending_id" name="blending_id" value="{{$item->blending_id}}" >
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-6">
		    	<label for="HorasEfectivas" class="form-label">Horas Efectivas</label>
		    	<input type="int" class="form-control" id="chronoInput" name="HorasEfectivas" value="{{$item->HorasEfectivas}}" step="0.01" min="0.01"  >

		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-6">
		    	<label for="topografia_id" class="form-label">Topografia</label>
		    	<input type="text" class="form-control" id="topografia_id" name="topografia_id" value="{{$item->topografia_id}}" >
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-6">
		    	<label for="N_volquetas" class="form-label">Nº Volquetas</label>
		    	<input type="text" class="form-control" id="N_volquetas" name="N_volquetas" value="{{$item->N_volquetas}}" >
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-6">
		    	<label for="N_viajes" class="form-label">Nº viajes</label>
		    	<input type="text" class="form-control" id="N_viajes" name="N_viajes" value="{{$item->N_viajes}}" >
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-6">
		    	<label for="toneladas_total" class="form-label">Total Tonelaje</label>
		    	<input type="text" class="form-control" id="toneladas_total" name="toneladas_total" value="{{$item->toneladas_total}}" >
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-6">
		    	<label for="balanza" class="form-label">Balanza</label>
		    	<input type="text" class="form-control" id="balanza" name="balanza" value="{{$item->balanza}}" >
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-6">
		    	<label for="produccione_id" class="form-label">Produccion</label>
		    	<input type="text" class="form-control" id="produccione_id" name="produccione_id" value="{{$item->produccione_id}}">
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
					
		  	<div class="col-12 col-md-1 my-3">
		    	<button class="btn btn-primary" type="submit">Guardar</button>
		  	</div>
		  	<!-- <div class="col-12 col-md-1 my-3">
		  		<a href="{{route('producciones.index')}}" class="btn btn-danger btn-sm">
		  			Salir
		  		</a>
		  	</div> -->
		</form>
	</div>

	<h1>Cronometro de Inicio de Trabajos</h1>
	<span id="chronotime">0:00:00:00</span>
	<form name="chronoForm">
	    <input type="button" name="startstop" value="start!" onClick="chronoStart()" />
	    <input type="button" name="reset" value="reset!" onClick="chronoReset()" />
	</form>

	

	

	<h1>
		Registrar viajes
	</h1>
	<div class="row my-4">
	  <table class="table">
	    <thead>
	      <tr>
	        <th scope="col">#id</th>
	        <th scope="col">panel</th>		       	
	       	<th scope="col">Volqueta</th>
	       	<th scope="col">Nivel</th>
	        <th scope="col">Voladura</th>
	        <th scope="col">Nº Viajes</th>
	      	<th scope="col">Aumentar</th>
	        <th scope="col">Ver detalle</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($viajes as $vi)
	      <tr>
	        <th scope="row">{{$vi->id}}</th>
	        <td>{{$vi->panele_id}}</td>
	        <td>{{$vi->volqueta_id}}</td>
	        <td>{{$vi->nivel}}</td>
	        <td>{{$vi->voladura}}</td>
	        <td>{{$vi->n_viajes}}</td>		        
	        <td>
	        	<form class="row form m-3 needs-validation" action="{{route('viajes.update', $vi->id)}}" method="post">
					@csrf 
					@method('put')
					
					<div class="col-md-6">
				    	<input type="number" class="form-control" id="n_viajes" name="n_viajes" value="{{$vi->n_viajes}}">
				  	</div>

				  	<div class="col-md-2">
				    	<button class="btn btn-primary" type="submit">guardar</button>
				  	</div>
				</form>
	        </td>
	         <td>
	           <a href="{{route('viajes.edit',$vi->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

	           <form href="{{route('viajes.edit',$vi->id)}}" method="post" class="d-inline">
	            @csrf 
	            @method('delete')
	              <button class="btn btn-danger btn-sm">
	                <img src="img/eliminar.png" alt="" height="25px">
	              </button>
	           </form>
	         </td>
	      </tr>
	     	@endforeach()
	    </tbody>		     
	  </table>
	</div>

	<h3>Detalle de actividades</h3>

	<div class="row my-4">
	  <table class="table">
	    <thead>
	      <tr>
	        <th scope="col">#id</th>
	        <th scope="col">Panel_id</th>		        
	       	<th scope="col">Parada_id</th>
	       	<th scope="col">Detalle</th>
	        <th scope="col">hora inicio</th>
	        <th scope="col">hora fin</th>
	      	<th scope="col">registrar fin</th>
	        <th scope="col">Ver detalle</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($actividades as $acti)
	      <tr>
	        <th scope="row">{{$acti->id}}</th>
	        <td>{{$acti->panele_id}}</td>
	        <td>{{$acti->parada_id}}</td>
	        <td><textarea>{{$acti->detalle}}</textarea></td>
	        <td>{{$acti->horaIni}}</td>
	        <!-- <td>{{$acti->horaFin}}</td> -->
	        <td>
	        	<form class="row form m-3 needs-validation" action="{{route('actividades.update', $acti->id)}}" method="post">
					@csrf 
					@method('put')
					
					<div class="col-md-6">
				    	<input type="time" class="form-control" id="horaFin" name="horaFin" value="{{$acti->horaFin}}">
				  	</div>
				  	<div class="col-md-2">
				    	<button class="btn btn-primary" type="submit">guardar</button>
				  	</div>
				</form>
	        </td>
	        
	         <td>
	           <a href="{{route('actividades.edit',$acti->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

	           <form action="{{route('actividades.destroy',$acti->id)}} " method="post" class="d-inline">
	            @csrf 
	            @method('delete')
	              <button class="btn btn-danger btn-sm">
	                <img src="img/eliminar.png" alt="" height="25px">
	              </button>
	           </form>
	         </td>
	      </tr>
	      @endforeach()
	    </tbody>
	  </table>
	</div>

	<h3>Maquinaria</h3>

	<div class="row my-4">
	  <table class="table">
	    <thead>
	      <tr>
	        <th scope="col">#id</th>
	        <th scope="col">Nombre</th>
	        <th scope="col">Estado</th>
	        <th scope="col">Hora Inicio</th>
	        <th scope="col">Hora Fin</th>
	        <th scope="col">Hora Efectiva</th>
	        <th scope="col">Horas Acumuladas</th>
	        <th scope="col">Acciones</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($maquinarias as $maqui)
	      <tr>
	        <th scope="row">{{$maqui->id}}</th>
	        <td>{{$maqui->nombre}}</td>
	        <td>{{$maqui->estado}}</td>
	        <td><input type="time" id="inicio{{$maqui->nombre}}"></td>
			<td><input type="time" id="final{{$maqui->nombre}}"></td>
			<td><input id="resultado{{$maqui->nombre}}"></td>
			<td id="res"></td>
			<td>{{$maqui->horasAcumuladas}}</td>
	         <td>
	           <a href="{{route('maquinarias.edit',$maqui->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

	           <form action="{{route('maquinarias.destroy',$maqui->id)}} " method="post" class="d-inline">
	            @csrf 
	            @method('delete')
	              <button class="btn btn-danger btn-sm">
	                <img src="img/eliminar.png" alt="" height="25px">
	              </button>
	           </form>
	         </td>
	      </tr>
	      @endforeach()
	    </tbody>
	  </table>
	</div>

	<div class="row">	
		<button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
		    Registrar Nuevo Viaje
		</button>
		<div class="collapse" id="collapseExample">
		  <div class="card card-body">
		   	<form class="row form m-3 needs-validation" action="{{route('viajes.store')}}" method="post">
		   		@csrf
	  			
			  	<div class="col-md-6">
			    	<label for="panele_id" class="form-label">panele_id</label>
			    	<input type="text" class="form-control" id="panele_id" name="panele_id" value="{{$item->id}}" >
			    	<div class="valid-feedback">
			      	Looks good!
			    	</div>
			  	</div>
			  	<div class="col-md-6">
			    	<label for="volqueta_id" class="form-label">Volqueta</label>
			    	<input type="text" class="form-control" id="volqueta_id" name="volqueta_id" >
			    	<div class="valid-feedback">
			      	Looks good!
			    	</div>
			  	</div>
			  	<div class="col-md-6">
			    	<label for="nivel" class="form-label">Nivel</label>
			    	<input type="text" class="form-control" id="nivel" name="nivel" required>
			    	<div class="valid-feedback">
			      	Looks good!
			    	</div>
			  	</div>
			  	<div class="col-md-6">
			    	<label for="voladura" class="form-label">Voladura</label>
			    	<input type="text" class="form-control" id="voladura" name="voladura" required>
			    	<div class="valid-feedback">
			      	Looks good!
			    	</div>
			  	</div>

			 	<div class="col-12 my-3">
			    	<button class="btn btn-primary" type="submit">Registrar</button>
			  	</div>
			</form>
		  </div>
		</div>
	</div>

	<div class="row my-4">
		  <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
		    Registrar Nueva Actividad
		  </button>
		<div class="collapse" id="collapseExample2">
		  <div class="card card-body">
		   	<form class="row form m-3 needs-validation" action="{{route('actividades.store')}} " method="post">
		   		@csrf
	  			
			  	<div class="col-md-6">
			    	<label for="panele_id" class="form-label">panele_id</label>
			    	<input type="text" class="form-control" id="panele_id" name="panele_id" value="{{$item->id}}">
			    	<div class="valid-feedback">
			      	Looks good!
			    	</div>
			  	</div>
			  	<div class="col-md-3">
			    	<label for="parada_id" class="form-label">parada_id</label>
			    	<input type="text" class="form-control" id="parada_id" name="parada_id" required>
			    	<div class="valid-feedback">
			      	Looks good!
			    	</div>
			  	</div>
			  	<div class="col-md-3">
			    	<a href="{{route('paradas.index')}} " class="btn btn-primary btn-sm">Nueva Parada</a>
			  	</div>
			  	<div class="col-md-6">
			    	<label for="detalle" class="form-label">Detalle</label>
			    	<input type="text" class="form-control" id="detalle" name="detalle" required>
			    	<div class="valid-feedback">
			      	Looks good!
			    	</div>
			  	</div>
			  	<div class="col-md-6">
			    	<label for="horaIni" class="form-label">hora Inicial</label>
			    	<input type="time" class="form-control" id="horaIni" name="horaIni" required>
			    	<div class="valid-feedback">
			      	Looks good!
			    	</div>
			  	</div>
			  	<div class="col-md-6">
			    	<label for="horaFin" class="form-label">hora Final</label>
			    	<input type="time" class="form-control" id="horaFin" name="horaFin" >
			    	<div class="valid-feedback">
			      	Looks good!
			    	</div>
			  	</div>
			 	<div class="col-12 my-3">
			    	<button class="btn btn-primary" type="submit">Registrar</button>
			  	</div>
			</form>
		  </div>
		</div>
	</div>

		<div class="col-12 col-md-1 my-3">
	  		<a href="{{route('paneles.index')}} " class="btn btn-danger btn-sm">
	  			Terminar Control
	  		</a>	    	
		</div> 

		<!-- function multiplicar(){
  			m1 = document.getElementById("multiplicando").value;
  		m2 = document.getElementById("multiplicador").value;
  			r = m1*m2;
  			document.getElementById("resultado").value = r;

			} -->
	<script>
					var inicio = document.getElementById('inicio{{$maqui->nombre}}'),
			    final = document.getElementById('final{{$maqui->nombre}}'),
			    resultado = document.getElementById('resultado{{$maqui->nombre}}');

			// en formato 24 hrs, ejemplo: '12:30', '03:47', '19:12'
			function horaFija(hora) {
			    const dia = new Date()
			    dia.setHours(...hora.split(':'), 0)
			    return dia
			}


			function calculaIntervalo(horaInicio, horaFinal) {
			    let fechaInicio = horaFija(horaInicio),
			        fechaFinal = horaFija(horaFinal)

			    if (fechaFinal < fechaInicio) {
			        fechaFinal.setDate(fechaFinal.getDate() + 1)
			    }

			    const diferencia = fechaFinal - fechaInicio,
			        horas = Math.floor(diferencia / 36e5),
			        minutos = Math.floor((diferencia % 36e5) / 6e4)
			    return [horas, minutos]
			}

			inicio.addEventListener('change', e => resultado.value = calculaIntervalo(e.target.value, final.value))
			final.addEventListener('change', e => resultado.value = calculaIntervalo(inicio.value, e.target.value))

			///cronometro

			var startTime = 0
			var start = 0
			var end = 0
			var diff = 0
			var timerID = 0
			function chrono(){
			    end = new Date()
			    diff = end - start
			    diff = new Date(diff)
			    var msec = diff.getMilliseconds()
			    var sec = diff.getSeconds()
			    var min = diff.getMinutes()
			    var hr = diff.getHours()-diff.getHours()
			    if (min < 10){
			        min = "0" + min
			    }
			    if (sec < 10){
			        sec = "0" + sec
			    }
			    if(msec < 10){
			        msec = "00" +msec
			    }
			    else if(msec < 100){
			        msec = "0" +msec
			    }
			    var time = hr + ":" + min + ":" + sec + ":" + msec
			    var inputTime = hr + "." + min + "." + sec
			    document.getElementById("chronotime").innerHTML = time
			    document.getElementById("chronoInput").value = inputTime
			    timerID = setTimeout("chrono()", 10)
			}
			function chronoStart(){
			    document.chronoForm.startstop.value = "stop!"
			    document.chronoForm.startstop.onclick = chronoStop
			    document.chronoForm.reset.onclick = chronoReset
			    start = new Date()
			    chrono()
			}
			function chronoContinue(){
			    document.chronoForm.startstop.value = "stop!"
			    document.chronoForm.startstop.onclick = chronoStop
			    document.chronoForm.reset.onclick = chronoReset
			    start = new Date()-diff
			    start = new Date(start)
			    chrono()
			}
			function chronoReset(){
			    document.getElementById("chronotime").innerHTML = "0:00:00:000"
			    start = new Date()
			}
			function chronoStopReset(){
			    document.getElementById("chronotime").innerHTML = "0:00:00:000"
			    document.chronoForm.startstop.onclick = chronoStart
			}
			function chronoStop(){
			    document.chronoForm.startstop.value = "start!"
			    document.chronoForm.startstop.onclick = chronoContinue
			    document.chronoForm.reset.onclick = chronoStopReset
			    clearTimeout(timerID)
			}
			

			
	</script>

	
</div>

	
@endsection

