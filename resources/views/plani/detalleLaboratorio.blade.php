@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Laboratorio')

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
			<form class="row form m-3 needs-validation" action="{{route('laboratorios.update', $item->id)}}" method="post">
				
				@csrf 
				@method('put')
		  			<div class="col-md-12">
				    	<label for="fecha" class="form-label">Fecha</label>
				    	<input type="text" class="form-control" id="fecha" name="fecha" value="{{$item->fecha}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
		  			<div class="col-md-2">
					    <label for="mg" class="form-label">MgO</label>
					      <input type="text" class="form-control" id="mg" name="mg" value="{{$item->mg}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="fe" class="form-label">Fe2O3</label>
					      <input type="text" class="form-control" id="fe" name="fe" value="{{$item->fe}}" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="si" class="form-label">SiO2</label>
					      <input type="text" class="form-control" id="si" name="si" value="{{$item->si}}" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="al" class="form-label">Al2O3</label>
					      <input type="text" class="form-control" id="al" name="al" value="{{$item->al}}" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="ca" class="form-label">CaO</label>
					      <input type="text" class="form-control" id="ca" name="ca" value="{{$item->ca}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="destino" class="form-label">Destino</label>
					      <input type="text" class="form-control" id="destino" name="destino" value="{{$item->destino}}" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="muestra_id" class="form-label">Muestra</label>
					      <input type="text" class="form-control" id="muestra_id" name="muestra_id" value="{{$item->muestra_id}}" required>
					      <div class="invalid-feedback">
					        Ingrese un dato existente
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="blending_id" class="form-label">Blending</label>
					      <input type="text" class="form-control" id="blending_id" name="blending_id" value="{{$item->blending_id}}" required>
					      <div class="invalid-feedback">
					        Ingrese un dato existente
					      </div>
					</div>
					<div class="col-md-12">
						<h3>Muestra</h3>
						<table class="table">
						    <thead>
						      <tr>
						        <th scope="col">#id</th>
						       	<th scope="col">Lote</th>
						       	<th scope="col">Tipo</th>
						        <th scope="col">Perforacion</th>
						        <th scope="col">Materia Prima</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <th scope="row">{{$muestra->id}}</th>
						        <td>{{$muestra->lote}}</td>
						        <td>{{$muestra->tipo}}</td>
						        <td><a href="{{route('perforaciones.edit',$muestra->perforacion_id)}}">{{$muestra->perforacion_id}}</a> </td>
						        <td><a href="{{route('materias.edit',$muestra->materia_id)}}">{{$muestra->materia_id}}</a></td>
						      </tr>
						    </tbody>
					  	</table>
			  		</div>

			  		<div class="col-md-12">
						<h3>Blending</h3>
						<table class="table">
						    <thead>
						      <tr>
						        <th scope="col">#id</th>
						       	<th scope="col">Codigo Produccion</th>
						       	<th scope="col">Fecha</th>
						        <th scope="col">FSM</th>
						        <th scope="col">MS</th>
						        <th scope="col">MA</th>
						      	<th scope="col">Toneladas</th>
						      	<th scope="col">Viajes</th>
						      	<th scope="col">Planificacion</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <th scope="row">{{$blending->id}}</th>
						        <td>{{$blending->codigo}}</td>
						        <td>{{$blending->fecha}}</td>
						        <td>{{$blending->fsc}}</td>
						        <td>{{$blending->ms}}</td>
						        <td>{{$blending->ma}}</td>
						        <td>{{$blending->toneladas}}</td>
						        <td>{{$blending->viajes}}</td>
						        <td><a href="{{route('planificacions.edit',$blending->planificacion_id)}}">{{$blending->planificacion_id}}</a> </td>
						      </tr>
						    </tbody>
					  	</table>
			  		</div>
					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('laboratorios.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>
		
</div>

@endsection