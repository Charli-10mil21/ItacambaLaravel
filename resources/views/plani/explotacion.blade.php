@extends('layouts.plantillaPlanificacion')

@section('title', 'Explotacion')

@section('content')
<div class="container py-4">
	<h1>
		Explotacion
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
		       	<th scope="col">Volumen</th>
		       	<th scope="col">Tonelaje</th>
		        <th scope="col">tiempo</th>
		        <th scope="col">taladros</th>
		        <th scope="col">Area</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->volumen}}</td>
		        <td>{{$item->tonelaje}}</td>
		        <td>{{$item->tiempo}}</td>
		        <td>{{$item->taladros}}</td>
		        <td><a href="{{route('topografias.edit',$item->topografia_id)}}">{{$item->topografia_id}}</a></td>
		         <td>
		           <a href="{{route('explotaciones.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('explotaciones.destroy',$item->id)}} " method="post" class="d-inline">
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
			    Registrar Nueva Explotacion
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('explotaciones.store')}}" method="post">
			   		@csrf
		  			
				  	<div class="col-md-6">
				    	<label for="volumen" class="form-label">Volumen</label>
				    	<input type="text" class="form-control" id="volumen" name="volumen" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
					<div class="col-md-4">
					    <label for="tonelaje" class="form-label">Tonelaje</label>
					      <input type="text" class="form-control" id="tonelaje" name="tonelaje" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="tiempo" class="form-label">Tiempo</label>
					      <input type="text" class="form-control" id="tiempo" name="tiempo" aria-describedby="inputGroupPrepend" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="taladros" class="form-label">Taladros</label>
					      <input type="text" class="form-control" id="taladros" name="taladros" aria-describedby="inputGroupPrepend" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-6">
		    			<label for="area" class="form-label">Area Topografica</label>
  						<select name="topografia_id" id="inputTopografia" class="form-control">
  							<option value=" ">--Escoja el area para la explotacion--</option>
  							@foreach($topografias as $topo)
  								<option value="{{$topo->id}}">{{$topo->area}}</option>
  							@endforeach()
  						</select>
		    			<div class="valid-feedback">
		      			Looks good!
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


@endsection