@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Muestra')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Perforacion y Muestra</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('muestras.update', $item->id)}}" method="post">
				
				@csrf 
				@method('put')
		  			<div class="col-md-2">
				    	<label for="codigo" class="form-label">Codigo</label>
				    	<input type="text" class="form-control" id="codigo" name="codigo" value="{{$item->codigo}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
		  			<div class="col-md-3">
		    			<label for="coordenadas" class="form-label">Coordenadas</label>
		    			<input type="text" class="form-control" id="coordenadas" name="coordenadas" value="{{$item->coordenadas}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-2">
					    <label for="profundidad" class="form-label">Profundidad</label>
					      <input type="text" class="form-control" id="profundidad" name="profundidad" value="{{$item->profundidad}}" required>
					      <div class="invalid-feedback">
					        Ingrese medida
					      </div>
					</div>
					<div class="col-md-3">
					    <label for="codigoM" class="form-label">Cod. Muestra</label>
					      <input type="text" class="form-control" id="codigoM" name="codigoM" value="{{$item->codigoM}}" required>
					</div>
					<div class="col-md-2">
					    <label for="poligono_id" class="form-label">Poligono</label>
					      <input type="text" class="form-control" id="poligono_id" name="poligono_id" value="{{$item->poligono_id}}" required>
					      <div class="invalid-feedback">
					        Ingrese poligono
					      </div>
					</div>
					<div class="row">
						<div class="col-12 col-md-2 my-3">
							<button class="btn btn-dark" type="submit">Guardar</button>
						  </div>
						  <div class="col-12 col-md-2 my-3">
							  <a href="{{route('muestras.index')}}" class="btn btn-danger btn-sm">
								  Salir
							  </a>
						  </div>
					</div>		
				  	
				</form>
		</div>
		
</div>

@endsection