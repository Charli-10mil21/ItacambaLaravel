@extends('layouts.plantilla')

@section('title', 'Detalle_Planificacion')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Informe Planificacion</h1>
		</div>
		<div class="col-md-12">
	  		<h3>Encargado</h3>
	  		<table class="table">
			    <thead>
			      <tr>
			        <th scope="col">#id</th>
			        <th scope="col">Nombre</th>
			        <th scope="col">Apellidos</th>
			        <th scope="col">Campo</th>
			        <th scope="col">Telefono</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <th scope="row">{{$user->id}}</th>
			        <td>{{$user->nombre}}</td>
			        <td>{{$user->apellido}}</td>
			        <td>{{$user->campo}}</td>
			        <td>{{$user->telefono}}</td>
			      </tr>
			    </tbody>
			  </table>
	  	</div>
	  	
		<div class="row col-md-12">
			<table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		        <th scope="col">Nombre Planificacion</th>
		        <th scope="col">Presupuesto</th>
		        <th scope="col">Produccion</th>
		        <th scope="col">Fecha Inicio</th>
		        <th scope="col">Fecha Fin</th>
		        <th scope="col">Duracion</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->name}}</td>
		        <td>{{$item->presupuesto}}</td>
		        <td>{{$item->produccion}}</td>
		        <td>{{$item->fechaIni}}</td>
		        <td>{{$item->fechaFin}}</td>
		        <td>{{$item->duracion}}</td>
		      </tr>
		    </tbody>
		  </table>
		</div>
		

	  	<div class="col-md-12">
	  		<h3>Blendings</h3>
	  		<table class="table">
			    <thead>
			      <tr>
			        <th scope="col">#id</th>
			       	<th scope="col">Codigo Produccion</th>
			       	<th scope="col">Fecha</th>
		       		<th scope="col2">FSC</th>
		       		<th scope="col2">MS</th>
		       		<th scope="col2">MA</th>
		       		<th scope="col2">Toneladas Totales</th>
		       		<th scope="col2">Viajes</th>
			      </tr>
			    </thead>
			    <tbody>
			     @foreach($blendings as $blen)
			      <tr>
			        <th scope="row">{{$blen->id}}</th>
			        <td>{{$blen->codigo}}</td>
			        <td>{{$blen->fecha}}</td>
			        <td>{{$blen->fsc}}</td>
			        <td>{{$blen->ms}}</td>
			        <td>{{$blen->ma}}</td>
			        <td>{{$blen->toneladas}}</td>
			        <td>{{$blen->viajes}}</td>
			      </tr>
			      @endforeach()
			    </tbody>
				</table>
	  	</div>		
</div>

<!-- esto es para jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- estos dos son para las graficas -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

<script>
	$.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
     }
 }); 
	
		$.ajax({
				url: '/informePlaniDetalle/planiBlendings/all',
				method: 'POST',
				data:{
					id:2,
					_token:$('input[name="_token"]').val()
			}
		}).done(function(res){

			alert(res);
		});		

</script>


@endsection