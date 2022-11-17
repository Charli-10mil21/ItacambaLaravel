@extends('layouts.plantilla')

@section('title', 'Detalle_Volqueta')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Volqueta</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('maquinarias.update', $maquinaria->id)}}" method="POST">
				
				@csrf 
				@method('put')
		  			<div class="col-md-12">
				    	<label for="nombre" class="form-label">nombre</label>
				    	<input type="text" class="form-control" id="nombre" name="nombre" value="{{$maquinaria->nombre}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-3">
					    <label for="estado" class="form-label">Estado</label>
					    <select class="form-select" id="estado" name="estado" required>
					      <option value="{{$maquinaria->estado}}">
					      		{{$maquinaria->estado}}
					      </option>
					      <option>Disponible</option>
					      <option>En uso</option>
					      <option>Mantenimiento</option>
					    </select>
					    <div class="invalid-feedback">
					      Escoja un campo valido
					    </div>
					</div>
		  			<div class="col-md-4">
		    			<label for="horasA" class="form-label">Hora Acumulada</label>
		    			<input type="string" class="form-control" id="horasA" name="horasA" value="{{$maquinaria->horasA}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('maquinarias.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>
		
	</div>


@endsection