@extends('layouts.plantilla')

@section('title', 'Detalle_Volqueta'. $volqueta->responsable)

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
			<form class="row form m-3 needs-validation" action="{{route('volquetas.update', $volqueta->id)}}" method="POST">
				
				@csrf 
				@method('put')
		  			<div class="col-md-12">
				    	<label for="responsable" class="form-label">Responsable</label>
				    	<input type="text" class="form-control" id="responsable" name="responsable" value="{{$volqueta->responsable}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
		  			<div class="col-md-4">
		    			<label for="placa" class="form-label">Placa</label>
		    			<input type="text" class="form-control" id="placa" name="placa" value="{{$volqueta->placa}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
					    <label for="peso" class="form-label">Peso Tara</label>
					    <div class="input-group has-validation">
					      <span class="input-group-text" id="inputGroupPrepend">KG</span>
					      <input type="text" class="form-control" id="peso" name="pesoTara" value="{{$volqueta->pesoTara}}" aria-describedby="inputGroupPrepend" required>
					      <div class="invalid-feedback">
					        Ingrese peso en kg
					      </div>
					    </div>
					</div>
					<div class="col-md-4">
					    <label for="area" class="form-label">Area destinado</label>
					    <select class="form-select" id="area" name="area"  required>
					      <option value="{{$volqueta->area}}">
					      		{{$volqueta->area}}
					      </option>
					      <option>Explotacion</option>
					      <option>Produccion</option>
					      <option>Expedicion</option>
					    </select>
					    <div class="invalid-feedback">
					      Escoja un campo valido
					    </div>
					</div>

					<div class="col-md-3">
					    <label for="estado" class="form-label">Estado</label>
					    <select class="form-select" id="estado" name="estado" required>
					      <option value="{{$volqueta->estado}}">
					      		{{$volqueta->estado}}
					      </option>
					      <option>Disponible</option>
					      <option>En uso</option>
					      <option>Mantenimiento</option>
					    </select>
					    <div class="invalid-feedback">
					      Escoja un campo valido
					    </div>
					</div>
					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('volquetas.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>
		
	</div>


@endsection