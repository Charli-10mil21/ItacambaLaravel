@extends('layouts.plantillaProduccion')

@section('title', 'Detalle_Actividad')

@section('content')


<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Actividad</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('actividades.update', $item->id)}}" method="post">
				@csrf 
				@method('put')
		  			<div class="col-md-6">
				    	<label for="id_parada" class="form-label">id_parada</label>
				    	<input type="text" class="form-control" id="id_parada" name="id_parada" value="{{$item->id_parada}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-6">
				    	<label for="id_panel" class="form-label">id_panel</label>
				    	<input type="text" class="form-control" id="id_panel" name="id_panel" value="{{$item->id_panel}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-6">
				    	<label for="detalle" class="form-label">detalle de actividad</label>
				    	<input type="text" class="form-control" id="detalle" name="detalle" value="{{$item->detalle}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-6">
				    	<label for="horaIni" class="form-label">Hora Inicio</label>
				    	<input type="time" class="form-control" id="horaIni" name="horaIni" value="{{$item->horaIni}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
					<div class="col-md-6">
				    	<label for="horaFin" class="form-label">Hora Fin</label>
				    	<input type="time" class="form-control" id="horaFin" name="horaFin" value="{{$item->horaFin}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('viajes.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>

</div>

@endsection