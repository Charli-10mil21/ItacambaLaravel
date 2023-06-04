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
		  			<div class="col-md-3">
		    			<label for="T_viajes" class="form-label">Total viajes</label>
		    			<input type="text" class="form-control" id="T_viajes" name="T_viajes" value="{{$item->T_viajes}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-3">
		    			<label for="T_horas" class="form-label">Total horas</label>
		    			<input type="text" class="form-control" id="T_horas" name="T_horas" value="{{$item->T_horas}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-3">
		    			<label for="H_efectivas" class="form-label">Horas efectivas</label>
		    			<input type="text" class="form-control" id="H_efectivas" name="H_efectivas" value="{{$item->H_efectivas}}" >
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-3">
		    			<label for="T_produccion" class="form-label">Total produccion Tn</label>
		    			<input type="text" class="form-control" id="T_produccion" name="T_produccion" value="{{$item->T_produccion}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-3">
		    			<label for="productividad" class="form-label">Productividad</label>
		    			<input type="text" class="form-control" id="productividad" name="productividad" value="{{$item->productividad}}" >
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-3">
		    			<label for="T_balanza" class="form-label">Total balanza</label>
		    			<input type="text" class="form-control" id="T_balanza" name="T_balanza" value="{{$item->T_balanza}}" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
					
				  	<div class="col-12 col-md-4 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-2 my-3">
				  		<a href="{{route('producciones.index')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				  	</div>

				</form>
				<div class="row">
					<div  class="col-12 col-md-2 my-3">
						<form method="POST" action="{{ route('actualizar', $item->id) }}">
							@csrf
							@method('put')
							<button type="submit" class="btn btn-primary">actualizar</button>
						</form>
					</div>
					<div class="col-12 col-md-2 my-3">
						<a href="{{route('pdfProduccion',$item->id)}}" class="btn btn-danger btn-sm">
						Generar Pdf
						</a>
					</div>
					  <div class="col-12 col-md-2 my-3">
					<a href="{{route('excelProduccion',$item->id)}}" class="btn btn-success btn-sm">
						Generar Excel
					</a>
					</div>

				</div>
				
		</div>
		<h1>Detalle de Turnos</h1>

		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Nombre Encargado</th>
		       	<th scope="col">Turno</th>
				<th scope="col">Hora Inicio</th>
				<th scope="col">Hora Final</th>
				<th scope="col">Horas Total</th>					       	
		       	<th scope="col">Horas Efectivas</th>	        
		        <th scope="col">Nº Volquetas</th>
		        <th scope="col">Viajes total</th>
		        <th scope="col">Toneladas</th>		        
		        <th scope="col">Balanza Integrada</th>
		      </tr>
		    </thead>
		    <tbody>
		       @foreach($paneles as $pan)
		      <tr>
		        <th scope="row">{{$pan->id}}</th>
		        <td>{{$pan->nombre}}</td>
				<td>
					@foreach($turnos as $turno)
					@if($pan->turno_id == $turno->id)
					{{$turno->name}}
					@endif
				@endforeach()
				</td>
				<td>{{$pan->HoraIni}}</td>
				<td>{{$pan->HoraFin}}</td>
				<td>{{$pan->HorasT}}</td>
		        <td>{{$pan->HorasEfectivas}}</td>
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

@endsection