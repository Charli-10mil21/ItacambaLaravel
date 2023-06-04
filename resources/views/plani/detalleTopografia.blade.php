@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Area')

@section('content')


<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Area</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('topografias.update', $item->id)}}" method="post">
				
				@csrf 
				@method('put')
		  			<div class="col-md-2">
				    	<label for="area" class="form-label">Nivel</label>
				    	<input type="text" class="form-control" id="area" name="area" value="{{$item->area}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
		  			<div class="col-md-4">
		    			<label for="levPuntos" class="form-label">Levantamiento de Puntos</label>
		    			<input type="text" class="form-control" id="levPuntos" name="levPuntos" value="{{$item->levPuntos}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
					    <label for="replanPuntos" class="form-label">Replantamiento de Puntos</label>
					      <input type="text" class="form-control" id="replanPuntos" name="replanPuntos" value="{{$item->replanPuntos}}" required>
					      <div class="invalid-feedback">
					        Ingrese peso en kg
					      </div>
					</div>
					
				  	<div class="col-12 col-md-2 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-2 my-3">
				  		<a href="{{route('topografias.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>

		<h1>Poligonos en esta area</h1>

		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Nombre</th>
		       	<th scope="col">Estado</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($poligonos as $poli)
		      <tr>
		        <th scope="row">{{$poli->id}}</th>
		        <td>{{$poli->nombre}}</td>
		        <td>{{$poli->estado}}</td>
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  
		</div>

		<h1>explotaciones realizadas en esta area</h1>

		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Volumen</th>
		       	<th scope="col">Tonelaje</th>
		        <th scope="col">tiempo</th>
		        <th scope="col">taladros</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($explotaciones as $explo)
		      <tr>
		        <th scope="row">{{$explo->id}}</th>
		        <td>{{$explo->volumen}}</td>
		        <td>{{$explo->tonelaje}}</td>
		        <td>{{$explo->tiempo}}</td>
		        <td>{{$explo->taladros}}</td>
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  
		</div>
		

</div>

@endsection