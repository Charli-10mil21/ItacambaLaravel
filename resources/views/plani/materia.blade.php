@extends('layouts.plantillaPlanificacion')

@section('title', 'Materia_Prima')

@section('content')
<div class="container py-4">
	<h1>
		Materia Prima
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
		       	<th scope="col">Nombre</th>
		       	<th scope="col">Tipo</th>
		        <th scope="col">Peso</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->name}}</td>
		        <td>{{$item->tipo}}</td>
		        <td>{{$item->peso}}</td>
		        <td>
		           <a href="{{route('materias.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('materias.destroy',$item->id)}} " method="post" class="d-inline">
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
			    Registrar Nueva Materia Prima
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('materias.store')}}" method="post">
			   		@csrf
		  			
				  	<div class="col-md-6">
				    	<label for="name" class="form-label">Nombre</label>
				    	<input type="text" class="form-control" id="name" name="name" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
					<div class="col-md-4">
					    <label for="tipo" class="form-label">Tipo</label>
					      <input type="text" class="form-control" id="tipo" name="tipo" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="peso" class="form-label">Peso</label>
					      <input type="text" class="form-control" id="peso" name="peso" aria-describedby="inputGroupPrepend" required>
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