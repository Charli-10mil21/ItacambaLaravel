@extends('layouts.plantillaProduccion')

@section('title', 'Parada')

@section('content')
<div class="container py-4">
	<h1>
		Tipo de Paradas
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
		       	<th scope="col">Tipo</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->tipo}}</td>
		         <td>
		           <a href="{{route('paradas.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('paradas.destroy',$item->id)}}" method="post" class="d-inline">
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
			    Registrar Nueva Parada
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('paradas.store')}}" method="post">
			   		@csrf
				  	<div class="col-md-6">
				    	<label for="tipo" class="form-label">Tipo de Parada</label>
				    	<input type="text" class="form-control" id="tipo" name="tipo" required>
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