@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Perforacion')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Perforacion</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('perforaciones.update', $item->id)}}" method="post">
				
				@csrf 
				@method('put')
		  			<div class="col-md-12">
				    	<label for="coordenadas" class="form-label">Coordenadas</label>
				    	<input type="text" class="form-control" id="coordenadas" name="coordenadas" value="{{$item->coordenadas}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
		  			<div class="col-md-4">
		    			<label for="profundidad" class="form-label">Profundidad</label>
		    			<input type="text" class="form-control" id="profundidad" name="profundidad" value="{{$item->profundidad}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
					    <label for="explotacion_id" class="form-label">Area Poligono</label>
					      <input type="text" class="form-control" id="explotacion_id" name="explotacion_id" value="{{$item->poligono_id}}" required>
					      <div class="invalid-feedback">
					        Ingrese area correcta
					      </div>
					</div>
					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('perforaciones.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>
		
</div>

@endsection