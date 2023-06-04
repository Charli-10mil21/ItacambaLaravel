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
		  			<div class="col-md-1">
					    <label for="SiO2" class="form-label">SiO2</label>
					      <input type="text" class="form-control" id="SiO2" name="SiO2" value="{{$item->SiO2}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="Al2O3" class="form-label">Al2O3</label>
					      <input type="text" class="form-control" id="Al2O3" name="Al2O3" value="{{$item->Al2O3}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="Fe2O3" class="form-label">Fe2O3</label>
					      <input type="text" class="form-control" id="Fe2O3" name="Fe2O3" value="{{$item->Fe2O3}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="CaO" class="form-label">CaO</label>
					      <input type="text" class="form-control" id="CaO" name="CaO" value="{{$item->CaO}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="MgO" class="form-label">MgO</label>
					      <input type="text" class="form-control" id="MgO" name="MgO" value="{{$item->MgO}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="Na2O" class="form-label">Na2O</label>
					      <input type="text" class="form-control" id="Na2O" name="Na2O" value="{{$item->Na2O}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="K2O" class="form-label">K2O</label>
					      <input type="text" class="form-control" id="K2O" name="K2O" value="{{$item->K2O}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="Cl" class="form-label">Cl</label>
					      <input type="text" class="form-control" id="Cl" name="Cl" value="{{$item->Cl}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="FSC" class="form-label">FSC</label>
					      <input type="text" class="form-control" id="FSC" name="FSC" value="{{$item->FSC}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="MS" class="form-label">MS</label>
					      <input type="text" class="form-control" id="MS" name="MS" value="{{$item->MS}}"required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="MA" class="form-label">MA</label>
					      <input type="text" class="form-control" id="MA" name="MA" value="{{$item->MA}}"required>
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
					{{-- <div class="col-md-12">
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
			  		</div> --}}

			  		{{-- <div class="col-md-12">
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
			  		</div> --}}
					
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