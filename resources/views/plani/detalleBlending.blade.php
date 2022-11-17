@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Blending')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Informe</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('blendings.update', $item->id)}}" method="post">
				
				@csrf 
				@method('put')
		  			<div class="col-md-12">
				    	<label for="codigo" class="form-label">Codigo Produccion</label>
				    	<input type="text" class="form-control" id="codigo" name="codigo" value="{{$item->codigo}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
		  			<div class="col-md-4">
		    			<label for="fecha" class="form-label">Fecha</label>
		    			<input type="date" class="form-control" id="fecha" name="fecha" value="{{$item->fecha}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-2">
					    <label for="fsc" class="form-label">FSC</label>
					      <input type="text" class="form-control" id="fsc" name="fsc" value="{{$item->fsc}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="ms" class="form-label">MS</label>
					      <input type="text" class="form-control" id="ms" name="ms" value="{{$item->ms}}" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="ma" class="form-label">MA</label>
					      <input type="text" class="form-control" id="ma" name="ma" value="{{$item->ma}}" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="toneladas" class="form-label">Toneladas Propuestas</label>
					      <input type="text" class="form-control" id="toneladas" name="toneladas" value="{{$item->toneladas}}" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="viajes" class="form-label">Viajes Volquetas</label>
					      <input type="text" class="form-control" id="viajes" name="viajes" value="{{$item->viajes}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="planificacion_id" class="form-label">Planificacion</label>
					    <select name="planificacion_id" id="planificacion_id" class="form-control">
  							<option value="{{$item->planificacion_id}} ">{{$plani->name}}</option>
  							@foreach($planificaciones as $plan)
  								<option value="{{$plan->id}}">{{$plan->name}}</option>
  							@endforeach()
  						</select>
					      <div class="invalid-feedback">
					        Ingrese una planificacion
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="topografia_id" class="form-label">Nivel Topografico</label>
					      <select name="topografia_id" id="topografia_id" class="form-control">
  							<option value="{{$item->topografia_id}} ">{{$topografia->area}}</option>
  							@foreach($topografias as $topo)
  								<option value="{{$topo->id}}">{{$topo->area}}</option>
  							@endforeach()
  						</select>
					      <div class="invalid-feedback">
					        Ingrese una planificacion
					      </div>
					</div>
					
					<div class="col-md-12">
						<h3>Planificacion</h3>
						<table class="table">
						    <thead>
						      <tr>
						        <th scope="col">#id</th>
						        <th scope="col">Nombre</th>
						        <th scope="col">Presupuesto</th>
						        <th scope="col">Produccion</th>
						        <th scope="col">Fecha Inicio</th>
						        <th scope="col">Fecha fin</th>
						        <th scope="col">Duracion</th>
						        <th scope="col">Usuario</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <th scope="row">{{$plani->id}}</th>
						        <td>{{$plani->name}}</td>
						        <td>{{$plani->presupuesto}}</td>
						        <td>{{$plani->produccion}}</td>
						        <td>{{$plani->fechaIni}}</td>
						        <td>{{$plani->fechaFin}}</td>
						        <td>{{$plani->duracion}}</td>
						        <td><a href="{{route('usuarios.detalle',$plani->user_id)}} ">{{$plani->user_id}}</a></td>
						      </tr>
						    </tbody>
						  </table>
					</div>

					<h3>Nivel Topografico</h3>
					<div class="col-md-12">
				  		<table class="table">
						    <thead>
						      <tr>
						        <th scope="col">#id</th>
						       	<th scope="col">Nivel</th>
						       	<th scope="col">Nº Voladura</th>
						        
						      </tr>
						    </thead>
						    <tbody>
							      <tr>
							        <th scope="row">{{$topografia->id}}</th>
							        <td>{{$topografia->area}}</td>
							       	       
							      </tr>
						    </tbody>
						  </table>				 	
				  	</div>

				  	<h1>Informes de Laboratorio</h1>

					<div class="row my-4">
					  <table class="table">
					    <thead>
					      <tr>
					        <th scope="col">#id</th>
					       	<th scope="col">Fecha</th>
					       	<th scope="col">Magnesio</th>			       	
					       	<th scope="col">Hierro</th>
					       	<th scope="col">Silicio</th>
					       	<th scope="col">Aluminio</th>
					       	<th scope="col">Calcio</th>
					       	<th scope="col">Destino</th>
					      </tr>
					    </thead>
					    <tbody>
					     @foreach($laboratorios as $lab)
					      <tr>
					        <th scope="row">{{$lab->id}}</th>
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

					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('blendings.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('pdf',$item->id)}}" class="btn btn-danger btn-sm">
				  			Generar Pdf
				  		</a>
				    	
				  	</div>
				</form>
		</div>
		
</div>

<script>
	function PasarValor()
	{
		var num1 = document.getElementById("toneladas").value;
		var res = Math.round(num1/26);
		document.getElementById("viajes").value = res;
	}
</script>

@endsection