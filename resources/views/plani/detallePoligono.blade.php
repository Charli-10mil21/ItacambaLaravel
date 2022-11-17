@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Poligono')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Poligono</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('poligonos.update', $item->id)}}" method="post">
				
				@csrf 
				@method('put')
		  			<div class="col-md-12">
				    	<label for="topografia_id" class="form-label"> ID Nivel</label>
				    	<select name="topografia_id" id="topografia_id" class="form-control">
  							<option value="{{$item->topografia_id}} ">{{$item->topografia_id}}</option>
  							@foreach($topografias as $topo)
  								<option value="{{$topo->id}}">{{$topo->area}}</option>
  							@endforeach()
  						</select>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-12">
				  		<table class="table">
						    <thead>
						      <tr>
						        <th scope="col">#id</th>
						       	<th scope="col">Nivel</th>
						       	<th scope="col">Levantamiento de Puntos</th>
						        <th scope="col">Replanteammiento de Puntos</th>
						        
						      </tr>
						    </thead>
						    <tbody>
							      <tr>
							        <th scope="row">{{$topografia->id}}</th>
							        <td>{{$topografia->area}}</td>
							        <td>{{$topografia->levPuntos}}</td>
							        <td>{{$topografia->replanPuntos}}</td>
							      </tr>
						    </tbody>
						  </table>
				  		
				  	</div>
		  			<div class="col-md-4">
		    			<label for="nombre" class="form-label">nombre</label>
		    			<input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->nombre}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
					    <label for="estado" class="form-label">Estado</label>
					      <select name="estado" id="estado" class="form-control">
  							<option value="{{$item->estado}} ">{{$item->estado}}</option>
  							<option value="propuesto">Poligono Propuesto</option>
  							<option value="perforando">Poligono en  Perforacion</option>
  							<option value="fragmentado">Material Fragmentado</option>
  						</select>
					      <div class="invalid-feedback">
					        escoja un estado
					      </div>
					</div>
					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('poligonos.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>

		<h1>Perforaciones en esta area</h1>

		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Nº Perforacion</th>
		       	<th scope="col">Coordenadas</th>
		       	<th scope="col">Profundidad</th>		       	
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($perforaciones as $perfo)
		      <tr>
		        <th scope="row">{{$perfo->id}}</th>
		        <td>{{$perfo->numero}}</td>
		        <td>{{$perfo->coordenadas}}</td>
		        <td>{{$perfo->profundidad}}</td>		        
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  
		</div>


		

		
</div>

@endsection