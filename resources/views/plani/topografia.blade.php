@extends('layouts.plantillaPlanificacion')

@section('title', 'Topografia')

@section('content')
<div class="container py-4">
	<h1>
		Topografia
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
		       	<th scope="col">Nivel</th>
		       	<th scope="col">Levantamiento de Puntos</th>
		        <th scope="col">Replanteammiento de Puntos</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->area}}</td>
		        <td>{{$item->levPuntos}}</td>
		        <td>{{$item->replanPuntos}}</td>
		         <td>
		           <a href="{{route('topografias.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('topografias.destroy',$item->id)}} " method="post" class="d-inline">
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
			    Registrar Nueva Area
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('topografias.store')}}" method="post">
			   		@csrf
		  			<!-- <div class="col-md-6">
		    			<label for="formFile" class="form-label">Imagen Zona</label>
  						<input class="form-control" type="file" id="formFile">
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div> -->
				  	<div class="col-md-6">
				    	<label for="area" class="form-label">Nivel</label>
				    	<input type="text" class="form-control" id="area" name="area" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
					<div class="col-md-4">
					    <label for="levPuntos" class="form-label">Levantamiento de puntos</label>
					      <input type="text" class="form-control" id="levPuntos" name="levPuntos" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="replanPuntos" class="form-label">Replantamiento de puntos</label>
					      <input type="text" class="form-control" id="replanPuntos" name="replanPuntos" aria-describedby="inputGroupPrepend" required>
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


@endsection