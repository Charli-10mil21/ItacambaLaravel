@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Muestra')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Muestra</h1>
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
		  			<div class="col-md-12">
				    	<label for="lote" class="form-label">Lote</label>
				    	<input type="text" class="form-control" id="lote" name="lote" value="{{$item->lote}}"  required>
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
					    <label for="perforacion_id" class="form-label">Area Perforacion</label>
					      <input type="text" class="form-control" id="perforacion_id" name="perforacion_id" value="{{$item->perforacion_id}}" required>
					      <div class="invalid-feedback">
					        Ingrese area correcta
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="materia_id" class="form-label">Tipo Materia</label>
					      <input type="text" class="form-control" id="materia_id" name="materia_id" value="{{$item->materia_id}}" required>
					      <div class="invalid-feedback">
					        Ingrese tipo correcto de materia prima
					      </div>
					</div>
					<div class="col-md-12">
						<h3>Perforacion</h3>
						<table class="table">
						    <thead>
						      <tr>
						        <th scope="col">#id</th>
						        <th scope="col">Nº de Perforacion</th>
						        <th scope="col">Coordenadas</th>
						       	<th scope="col">Profundidad</th>
						        <th scope="col">Area Voladura</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <th scope="row">{{$perforacion->id}}</th>
						        <td>{{$perforacion->numero}}</td>
						        <td>{{$perforacion->coordenadas}}</td>
						        <td>{{$perforacion->profundidad}}</td>
						        <td>{{$poligono->nombre}}</td>

						      </tr>
						    </tbody>
					  	</table>
			  		</div>
					<div class="col-md-12">
						<h3>tipo materia prima</h3>
						<table class="table">
						    <thead>
						      <tr>
						        <th scope="col">#id</th>
						       	<th scope="col">Nombre</th>
						       	<th scope="col">Tipo</th>
						        <th scope="col">Peso</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <th scope="row">{{$materia->id}}</th>
						        <td>{{$materia->name}}</td>
						        <td>{{$materia->tipo}}</td>
						        <td>{{$materia->peso}}</td>
						      </tr>
						    </tbody>
					  	</table>
			  		</div>					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('muestras.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				  	</div>
				</form>
		</div>
		
</div>

@endsection