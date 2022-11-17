@extends('layouts.plantillaProduccion')

@section('title', 'Detalle_Parada')

@section('content')


<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Parada</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('paradas.update', $item->id)}}" method="post">
				@csrf 
				@method('put')
		  			<div class="col-md-12">
				    	<label for="tipo" class="form-label">Tipo de Parada</label>
				    	<input type="text" class="form-control" id="tipo" name="tipo" value="{{$item->tipo}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('paradas.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>

</div>

@endsection