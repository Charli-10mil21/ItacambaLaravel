@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Explotacion')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Explotacion</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('explotaciones.update', $item->id)}}" method="post">
				
				@csrf 
				@method('put')
		  			<div class="col-md-12">
				    	<label for="area" class="form-label">Area</label>
				    	<input type="text" class="form-control" id="area" name="topografia_id" value="{{$item->topografia_id}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-12">
				  		<table class="table">
						    <thead>
						      <tr>
						        <th scope="col">#id</th>
						        <th scope="col">Zona</th>
						       	<th scope="col">Area</th>
						       	<th scope="col">Levantamiento de Puntos</th>
						        <th scope="col">Replanteammiento de Puntos</th>
						        
						      </tr>
						    </thead>
						    <tbody>
							      <tr>
							        <th scope="row">{{$topografia->id}}</th>
							        <td>{{$topografia->area}}</td>
							        <td>{{$topografia->area}}</td>
							        <td>{{$topografia->levPuntos}}</td>
							        <td>{{$topografia->replanPuntos}}</td>
							      </tr>
						    </tbody>
						  </table>
				  		
				  	</div>
		  			<div class="col-md-4">
		    			<label for="volumen" class="form-label">Volumen</label>
		    			<input type="text" class="form-control" id="volumen" name="volumen" value="{{$item->volumen}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
					    <label for="tonelaje" class="form-label">Tonelaje</label>
					      <input type="text" class="form-control" id="tonelaje" name="tonelaje" value="{{$item->tonelaje}}" required>
					      <div class="invalid-feedback">
					        Ingrese peso en kg
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="fecha" class="form-label">fecha</label>
					      <input type="date" class="form-control" id="fecha" name="fecha" value="{{$item->fecha}}" >
					      <div class="invalid-feedback">
					        Ingrese un fecha programada
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="taladros" class="form-label">Taladros</label>
					      <input type="text" class="form-control" id="taladros" name="taladros" value="{{$item->taladros}}" required>
					      <div class="invalid-feedback">
					        Ingrese un taladros en unidades
					      </div>
					</div>
					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('explotaciones.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>


		

		
</div>

@endsection