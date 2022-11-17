@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Planificacion')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Informe Planificacion</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('planificacions.update', $item->id)}}" method="post">
				
				@csrf 
				@method('put')
		  			<div class="col-md-12">
				    	<label for="name" class="form-label">Nombre</label>
				    	<input type="text" class="form-control" id="name" name="name" value="{{$item->name}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
		  			<div class="col-md-4">
		    			<label for="presupuesto" class="form-label">Presupuesto</label>
		    			<input type="text" class="form-control" id="presupuesto" name="presupuesto" value="{{$item->presupuesto}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
					    <label for="produccion" class="form-label">Produccion</label>
					      <input type="text" class="form-control" id="produccion" name="produccion" value="{{$item->produccion}}" required>
					      <div class="invalid-feedback">
					        Ingrese peso en kg
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="fechaIni" class="form-label">Fecha Inicio</label>
					      <input type="date" class="form-control" id="fechaIni" name="fechaIni" value="{{$item->fechaIni}}" required>
					      <div class="invalid-feedback">
					        Ingrese peso en kg
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="fechaFin" class="form-label">Fecha Fin</label>
					      <input type="date" class="form-control" id="fechaFin" name="fechaFin" value="{{$item->fechaFin}}" required>
					      <div class="invalid-feedback">
					        Ingrese peso en kg
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="duracion" class="form-label">Duracion</label>
					      <input type="text" class="form-control" id="duracion" name="duracion" value="{{$item->duracion}}" required>
					      <div class="invalid-feedback">
					        Ingrese tiempo en dias
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="user_id" class="form-label">Usuario</label>
					      <input type="text" class="form-control" id="user_id" name="user_id" value="{{$item->user_id}}" required>
					      <div class="invalid-feedback">
					        Ingrese un dato existente
					      </div>
					</div>
				  	<div class="col-md-12">
				  		<h3>Encargado</h3>
				  		<table class="table">
						    <thead>
						      <tr>
						        <th scope="col">#id</th>
						        <th scope="col">Nombre</th>
						        <th scope="col">Apellidos</th>
						        <th scope="col">Campo</th>
						        <th scope="col">Telefono</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <th scope="row">{{$user->id}}</th>
						        <td>{{$user->nombre}}</td>
						        <td>{{$user->apellido}}</td>
						        <td>{{$user->campo}}</td>
						        <td>{{$user->telefono}}</td>
						      </tr>
						    </tbody>
						  </table>
				  	</div>

				  	<div class="col-md-12">
				  		<h3>Blendings</h3>
				  		<table class="table">
						    <thead>
						      <tr>
						        <th scope="col">#id</th>
						       	<th scope="col">Codigo Produccion</th>
						       	<th scope="col">Fecha</th>
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
						        <th scope="row">{{$blen->id}}</th>
						        <td>{{$blen->codigo}}</td>
						        <td>{{$blen->fecha}}</td>
						        <td>{{$blen->fsc}}</td>
						        <td>{{$blen->ms}}</td>
						        <td>{{$blen->ma}}</td>
						        <td>{{$blen->toneladas}}</td>
						        <td>{{$blen->viajes}}</td>
						      </tr>
						      @endforeach()
						    </tbody>
		  				</table>
				  	</div>
					
					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('planificacions.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>
		
</div>

@endsection