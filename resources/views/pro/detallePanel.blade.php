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
		<form  id="form1" class="row form m-3 needs-validation" action="{{route('paneles.update', $item->id)}}" method="post">
		@csrf 
		@method('put')
		  	<div class="col-md-2">
		    	<label for="nombre" class="form-label">Nombre</label>
		    	<input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->nombre}}" required>
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
			<div class="col-md-2">
		    	<label for="HoraIni" class="form-label">Horas Inicio</label>
		    	<input type="time" class="form-control" name="HoraIni" value="{{$item->HoraIni}}" min="00:00" max="23:59" >

		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
			<div class="col-md-2">
		    	<label for="HoraFin" class="form-label">Horas Fin</label>
		    	<input type="time" class="form-control"name="HoraFin" value="{{$item->HoraFin}}" min="00:00" max="23:59" >

		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-2">
		    	<label for="HorasT" class="form-label">Horas Total</label>
		    	<input type="int" class="form-control" name="HorasT" value="{{$item->HorasT}}" >

		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
			<div class="col-md-2">
		    	<label for="HorasEfectivas" class="form-label">Horas Efectivas</label>
		    	<input type="int" class="form-control" id="chronoInput" name="HorasEfectivas" value="{{$item->HorasEfectivas}}">

		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-2">
		    	<label for="N_volquetas" class="form-label">Nº Volquetas</label>
		    	<input type="text" class="form-control" id="N_volquetas" name="N_volquetas" value="{{$item->N_volquetas}}" >
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-2">
		    	<label for="N_viajes" class="form-label">Nº viajes</label>
		    	<input type="text" class="form-control" id="N_viajes" name="N_viajes" value="{{$item->N_viajes}}"  >
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-2">
		    	<label for="toneladas_total" class="form-label">Total Tonelaje</label>
		    	<input type="text" class="form-control" id="toneladas_total" name="toneladas_total" value="{{$item->toneladas_total}}" >
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-2">
		    	<label for="balanza" class="form-label">Balanza</label>
		    	<input type="text" class="form-control" id="balanza" name="balanza" value="{{$item->balanza}}" >
		    	<div class="valid-feedback">
		      	Looks good!
		    	</div>
		  	</div>
		  	<div class="col-md-2">
		    	<label for="produccione_id" class="form-label">Produccion</label>
				<select name="produccione_id" id="produccione_id" class="form-control">
					@foreach($producciones as $pro)
						@if ($item->produccione_id == $pro->id)
						<option value="{{$pro->id}}">{{$pro->fecha}}</option>
						@endif
					@endforeach()
				  </select>
		  	</div>
			<div class="col-md-2">
				<label for="turno_id" class="form-label">Turno</label>
				<select name="turno_id" id="turno_id" class="form-control">
					@foreach($turnos as $turno)
						@if ($item->turno_id == $turno->id)
						<option value="{{$turno->id}}">{{$turno->name}}</option>
						@endif
					@endforeach()
				  </select>
		  	</div>
					
		  	<div class="col-12 col-md-3 my-3">
		    	<button class="btn btn-primary" type="submit">Guardar</button>
		  	
		</div>
	</div>
		<div class="col-12 col-md-3 my-3">
	  		<a href="{{route('pdfPanel',$item->id)}}" class="btn btn-danger btn-sm">
		  	Generar Pdf
	  		</a>
  		</div>
		<div class="col-12 col-md-3 my-3">
		  <a href="{{route('excelPanel',$item->id)}}" class="btn btn-success btn-sm">
			  Generar Excel
		  </a>
	  	</div>
		  	<!-- <div class="col-12 col-md-1 my-3">
		  		<a href="{{route('producciones.index')}}" class="btn btn-danger btn-sm">
		  			Salir
		  		</a>
		  	</div> -->
		</form>

	

	<h2>
		Registrar viajes
	</h2>
	<div class="row my-4">
	  <table class="table">
	    <thead>
	      <tr>
	        <th scope="col">#id</th>	       	
	       	<th scope="col">Volqueta</th>
	       	<th scope="col">Nivel</th>
	        <th scope="col">Voladura</th>
	        <th scope="col">Nº Viajes</th>
	      	<th scope="col">Aumentar</th>
			<th scope="col">Restar</th>
			<th scope="col">Eliminar</th>
	        <!-- <th scope="col">Ver detalle</th> -->
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($viajes as $vi)
	      <tr>
	        <th scope="row">{{$vi->id}}</th>
	        <td>{{$vi->volqueta_id}}</td>
	        <td>{{$vi->nivel}}</td>
	        <td>{{$vi->voladura}}</td>
	        <td class="viaje{{$vi->id}}">{{$vi->n_viajes}}</td>
			<td>
				<form method="POST" action="{{ route('sumarviaje', $vi->id) }}">
				@csrf
				@method('put')
				<button type="submit" class="btn btn-primary">+</button>
				</form>
			</td>
			<td>
				<form method="POST" action="{{ route('restarviaje', $vi->id) }}">
				@csrf
				@method('put')
				<button type="submit" class="btn btn-danger">-</button>
				</form>
			</td>		        
	
	        <td>
	           <form action="{{route('viajes.destroy',$vi->id)}} " method="POST" class="d-inline">
	            @csrf 
	            @method('delete')
	              <button type="submit" class="btn btn-danger btn-sm">
	                {{-- <img src="../img/eliminar.png" alt="" height="25px"> --}}
					eliminar
	              </button>
	           </form>
	        </td> 
	      </tr>
	     	@endforeach()
	     	
	    </tbody>		     
	  </table>
	</div>



	<h2>Ocurrencias</h2>

	<div class="row my-4">
	  <table class="table">
	    <thead>
	      <tr>
	        <th scope="col">#id</th>		        
	       	<th scope="col">Tipo Parada</th>
	       	<th scope="col">Descripcion</th>
	        <th scope="col">hora inicio</th>
	        <th scope="col">hora fin</th>
			<th scope="col">Duracion</th>
	        <th scope="col">Eliminar</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($actividades as $acti)
	      <tr>
	        <th scope="row">{{$acti->id}}</th>
	        <td>
				@foreach ($paradas as $pa)
					@if ($acti->parada_id == $pa->id)
					{{$pa->tipo}}
					@endif
				@endforeach
			</td>
	        <td><textarea>{{$acti->detalle}}</textarea></td>
	        <td>{{$acti->horaIni}}</td>
	        <td>
	        	<form id="form3"  action="{{route('actividades.update', $acti->id)}}" method="post">
					@csrf 
					@method('put')
					
					{{-- <div class="col-md-6">
				    	<input type="time"  id="horaFin" name="horaFin" value="{{$acti->horaFin}}">
				  	</div>
				  	<div class="col-md-2 my-2">
				    	<button class="btn btn-primary" type="submit">guardar</button>
				  	</div> --}}

					  <div class="input-group mb-3">
						<input type="time" class="form-control" id="horaFin" name="horaFin" value="{{$acti->horaFin}}">
						<div class="input-group-append">
						  <button class="btn btn-outline-primary" type="submit">guardar</button>
						</div>
					  </div>
				</form>
	        </td>
	        <td>{{$acti->Duracion}}</td>
	         <td>
	           <form action="{{route('actividades.destroy',$acti->id)}} " method="post" class="d-inline">
	            @csrf 
	            @method('delete')
	              <button class="btn btn-danger btn-sm">
	                eliminar
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
			  <th scope="col">Panel_id</th>		        
				 <th scope="col">Maquinaria_id</th>
				 <th scope="col">Codigo</th>
			  <th scope="col">hora Uso</th>
			  <th scope="col">Eliminar</th>
			</tr>
		  </thead>
		  <tbody>
			  @foreach($usoMaquinarias as $uso)
			<tr>
			  <th scope="row">{{$uso->id}}</th>
			  <td>{{$uso->panele_id}}</td>
			  <td>{{$uso->maquinaria_id}}</td>
			  <td>
				@foreach($maquinarias as $maqui)
					@if($uso->maquinaria_id == $maqui->id)
					{{$maqui->codigo}}
					@endif
				@endforeach()
				
			  </td>
			  <td>
				  <form id="form4" class="row form m-3 needs-validation" action="{{route('descMaquinarias.update', $uso->id)}} " method="post">
					  @csrf 
					  @method('put')
					  
					  <div class="col-md-6">
						  <input type="int"  class="form-control" id="horaUso" name="horaUso" value="{{$uso->horaUso}}">
						</div>
						<div class="col-md-2">
						  <button class="btn btn-primary" type="submit">guardar</button>
						</div>
				  </form>
			  </td>
			  
			   <td>
				 <form action="{{route('descMaquinarias.destroy',$uso->id)}} " method="post" class="d-inline">
				  @csrf 
				  @method('delete')
					<button class="btn btn-danger btn-sm">
					  eliminar
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
			    	<label for="volqueta_id" class="form-label">Volquetas</label>
					  <select name="volqueta_id" id="volqueta_id" class="form-control">
						  <option value=" ">--Escoja una volqueta--</option>
						  @foreach($volquetas as $vol)
						  		@if($vol->estado == "Disponible")
								  <option value="{{$vol->id}}">{{$vol->responsable}}</option>
								@endif
						  @endforeach()
						  </select>
					  <div class="invalid-feedback">
						inserte puntos validos
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
		    Registrar Nueva Ocurrencia
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
			    	<select name="parada_id" id="parada_id" class="form-control">
						<option value=" ">--Escoje el tipo de parada--</option>
						@foreach($paradas as $pa)
							<option value="{{$pa->id}}">{{$pa->tipo}}</option>
						@endforeach()
					  </select>
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
			 	<div class="col-12 my-3">
			    	<button class="btn btn-primary" type="submit">Registrar</button>
			  	</div>
			</form>
		  </div>
		</div>
	</div>

	<div class="row my-4">
		<button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
		  Registrar uso de Maquinaria
		</button>
	  <div class="collapse" id="collapseExample3">
		<div class="card card-body">
			 <form class="row form m-3 needs-validation" action="{{route('descMaquinarias.store')}} " method="post">
				 @csrf
				
				<div class="col-md-6">
				  <label for="panele_id" class="form-label">panele_id</label>
				  <input type="text" class="form-control" id="panele_id" name="panele_id" value="{{$item->id}}">
				  <div class="valid-feedback">
					Looks good!
				  </div>
				</div>
				<div class="col-md-3">
				  <label for="maquinaria_id" class="form-label">maquinaria_id</label>
				  <select name="maquinaria_id" id="maquinaria_id" class="form-control">
					  <option value=" ">--Escoje la maquinaria--</option>
					  @foreach($maquinarias as $uso)
						  <option value="{{$uso->id}}">{{$uso->codigo}}</option>
					  @endforeach()
					</select>
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
</div>

	

	
@endsection

