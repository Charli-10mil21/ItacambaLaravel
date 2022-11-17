@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Materia')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Materia Prima</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('materias.update', $item->id)}}" method="post">
				
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
		    			<label for="tipo" class="form-label">Tipo</label>
		    			<input type="text" class="form-control" id="tipo" name="tipo" value="{{$item->tipo}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
					    <label for="peso" class="form-label">Peso</label>
					      <input type="text" class="form-control" id="peso" name="peso" value="{{$item->peso}}" required>
					      <div class="invalid-feedback">
					        Ingrese area correcta
					      </div>
					</div>
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('materias.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>
		
</div>

@endsection