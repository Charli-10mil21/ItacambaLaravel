@extends('layouts.plantillaProduccion')

@section('title', 'Detalle_Produccion')

@section('content')


<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Produccion</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('producciones.update', $item->id)}}" method="post">
				
				@csrf 
				@method('put')
		  			<div class="col-md-3">
				    	<label for="fecha" class="form-label">Fecha</label>
				    	<input type="date" class="form-control" id="fecha" name="fecha" value="{{$item->fecha}}"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
		  			<div class="col-md-4">
		    			<label for="cinta" class="form-label">Cinta Transportadora</label>
		    			<input type="text" class="form-control" id="cinta" name="cinta" value="{{$item->cinta}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
		    			<label for="T_viajes" class="form-label">Total viajes</label>
		    			<input type="text" class="form-control" id="T_viajes" name="T_viajes" value="{{$item->T_viajes}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
		    			<label for="T_horas" class="form-label">Total horas</label>
		    			<input type="text" class="form-control" id="T_horas" name="T_horas" value="{{$item->T_horas}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
		    			<label for="H_efectivas" class="form-label">Horas efectivas</label>
		    			<input type="text" class="form-control" id="H_efectivas" name="H_efectivas" value="{{$item->H_efectivas}}" >
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
		    			<label for="T_produccion" class="form-label">Total produccion Tn</label>
		    			<input type="text" class="form-control" id="T_produccion" name="T_produccion" value="{{$item->T_produccion}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
		    			<label for="productividad" class="form-label">Productividad</label>
		    			<input type="text" class="form-control" id="productividad" name="productividad" value="{{$item->productividad}}" >
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
		    			<label for="T_balanza" class="form-label">Total balanza</label>
		    			<input type="text" class="form-control" id="T_balanza" name="T_balanza" value="{{$item->T_balanza}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('producciones.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>

		<h1>Detalle de Turnos</h1>

		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Fecha</th>
		       	<th scope="col">Nombre Encargado</th>
		       	<th scope="col">Turno</th>		       	
		       	<th scope="col">Blending_id</th>
		       	<th scope="col">Horas Efectivas</th>
		       	<th scope="col">Topografia_id</th>		        
		        <th scope="col">Nº Volquetas</th>
		        <th scope="col">Viajes total</th>
		        <th scope="col">Toneladas</th>		        
		        <th scope="col">Balanza Integrada</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@php
	    		$totalVi = 0;
	    		$totalHo = 0;
	    		$totalTn = 0;
	    		$totalBa = 0;   		
	    		@endphp
		       @foreach($paneles as $pan)
		       @php
	    		$viajes=$pan->N_viajes;
	    		$totalVi += $viajes;
	    		$horas=$pan->HorasEfectivas;
	    		$totalHo += $horas;
	    		$toneladas=$pan->toneladas_total;
	    		$totalTn += $toneladas;
	    		$balanza=$pan->balanza;
	    		$totalBa += $balanza;
	    		@endphp
		      <tr>
		        <th scope="row">{{$pan->id}}</th>
		        <td>{{$pan->fecha}}</td>
		        <td>{{$pan->nombre}}</td>
		        <td>{{$pan->turno}}</td>
		        <td>{{$pan->blending_id}}</td>
		        <td>{{$pan->HorasEfectivas}}</td>
		        <td>{{$pan->topografia_id}}</td>
		        <td>{{$pan->N_volquetas}}</td>
		        <td>{{$pan->N_viajes}}</td>
		        <td>{{$pan->toneladas_total}}</td>
		        <td>{{$pan->balanza}}</td>
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		</div>


</div>

<script>

	document.getElementById("T_viajes").value = {{$totalVi}};
	document.getElementById("T_horas").value = {{$totalHo}};
	document.getElementById("T_produccion").value = {{$totalTn}};
	document.getElementById("T_balanza").value = {{$totalBa}};

	var ton = document.getElementById("T_produccion").value;
	var horas = document.getElementById("T_horas").value;
	var productividad = Math.round(ton/horas);
	document.getElementById("productividad").value = productividad;


</script>

@endsection