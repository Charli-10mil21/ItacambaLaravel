@extends('layouts.plantillaPlanificacion')

@section('title', 'Blending')

@section('content')
<div class="container py-4">
	<h1>
		Blending
	</h1>
		<div class="row my-4">
		  <form action=" ">
		    <div class="form-row">
		      <div class="col-sm-4 my-1">
		        <input type="text" class="form-control" name="busqueda" >
		      </div>
		      <div class="col auto my-1">
		        <input type="submit" class="btn btn-primary" value="Buscar">
		      </div>
		    </div>
		  </form>
		</div>


		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Codigo Produccion</th>
		       	<th scope="col">Fecha</th>
	       		<th scope="col2">FSC</th>
	       		<th scope="col2">MS</th>
	       		<th scope="col2">MA</th>
	       		<th scope="col2">Toneladas Propuestas</th>
	       		<th scope="col2">Viajes</th>
		        <th scope="col">Planificacion</th>
		        <th scope="col">Nivel Topografico</th>		        
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->codigo}}</td>
		        <td>{{$item->fecha}}</td>
		        <td>{{$item->fsc}}</td>
		        <td>{{$item->ms}}</td>
		        <td>{{$item->ma}}</td>
		        <td>{{$item->toneladas}}</td>
		        <td>{{$item->viajes}}</td>
		        <td><a href="{{route('planificacions.edit',$item->planificacion_id)}}">{{$item->planificacion_id}}</a></td>
		        <td><a href="{{route('topografias.edit',$item->topografia_id)}}">{{$item->topografia_id}}</a></td>
		         <td>
		           <a href="{{route('blendings.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('blendings.destroy',$item->id)}} " method="post" class="d-inline">
		            @csrf 
		            @method('delete')
		              <button class="btn btn-danger btn-sm">
		                <img src="img/eliminar.png" alt="" height="25px">
		              </button>
		           </form>
		         </td>
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  {{ $items->links('pagination::bootstrap-4') }}
		</div>

		<div class="row">
				@if(session('mensaje')) 
					<div class="alert alert-success">
						{{session('mensaje')}}
					</div>
				@endif
			  <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			    Registrar Nuevo Blending
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('blendings.store')}}" method="post">
			   		@csrf
		  			
				  	<div class="col-md-6">
				    	<label for="codigo" class="form-label">Codigo Produccion</label>
				    	<input type="text" class="form-control" id="codigo" name="codigo" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-4">
					    <label for="fecha" class="form-label">Fecha</label>
					      <input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="inputGroupPrepend" required>
					      <div class="invalid-feedback">
					        inserte fecha
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="fsc" class="form-label">FSC</label>
					      <input type="text" class="form-control" id="fsc" name="fsc" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="ms" class="form-label">MS</label>
					      <input type="text" class="form-control" id="ms" name="ms" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="ma" class="form-label">MA</label>
					      <input type="text" class="form-control" id="ma" name="ma" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="toneladas" class="form-label">Toneladas</label>
					      <input type="text" class="form-control" id="toneladas" name="toneladas" onkeyup="PasarValor();" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="viajes" class="form-label">Viajes</label>
					      <input type="text" class="form-control" id="viajes" name="viajes" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="planificacion_id" class="form-label">Planificacion</label>
					      <select name="planificacion_id" id="inputPlanificacion" class="form-control">
  							<option value=" ">--Escoja la planificacion--</option>
  							@foreach($planificaciones as $plan)
  								<option value="{{$plan->id}}">{{$plan->name}}</option>
  							@endforeach()
  							</select>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="topografia_id" class="form-label">Nivel Topografico</label>
					      <select name="topografia_id" id="inputTopografia" class="form-control">
  							<option value=" ">--Escoja el nivel Topografico--</option>
  							@foreach($topografias as $topo)
  								<option value="{{$topo->id}}">{{$topo->area}}</option>
  							@endforeach()
  							</select>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>

				 	<div class="col-12 my-3">
				    	<button class="btn btn-primary" type="submit">Registrar</button>
				  	</div>
				</form>
			  </div>
			</div>
		</div>
	
</div>

<script>
	function PasarValor()
	{
		var num1 = document.getElementById("toneladas").value;
		var res = Math.round(num1/26);
		document.getElementById("viajes").value = res;
	}
</script>



@endsection