@extends('layouts.plantilla')

@section('title', 'Maquinarias')


@section('content')

<div class="container py-4">
		<div class="row my-4">
		  <form action=" ">
		    <div class="form-row">
		      <div class="col-sm-4 my-1">
		        <input type="text" class="form-control" name="busqueda" value="Nº Placa">
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
		        <th scope="col">Estado</th>
		        <th scope="col">Horas Acumuladas</th>
		        <th scope="col">Acciones</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($maquinarias as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->nombre}}</td>
		        <td>{{$item->estado}}</td>
		        <td>{{$item->horasA}}</td>
		         <td>
		           <a href="{{route('maquinarias.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('maquinarias.destroy',$item->id)}} " method="post" class="d-inline">
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
		  {{ $maquinarias->links('pagination::bootstrap-4') }}
		</div>

		<div class="row"> 
				@if(session('mensaje')) 
					<div class="alert alert-success">
						{{session('mensaje')}}
					</div>
				@endif
			  <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			    Registrar Nueva Maquinaria
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('maquinarias.store')}}" method="POST">
			   		@csrf 

		  			<div class="col-md-12">
				    	<label for="nombre" class="form-label">Nombre</label>
				    	<input type="text" class="form-control" id="nombre" name="nombre"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-3">
					    <label for="estado" class="form-label">Estado</label>
					    <select class="form-select" id="estado" name="estado" required>
					      <option  value="Disponible">
					      		Disponible
					      </option>
					      <option value="En uso">En uso</option>
					      <option value="Mantenimiento">Mantenimiento</option>
					    </select>
					    <div class="invalid-feedback">
					      Escoja un campo valido
					    </div>
					</div>
		  			<div class="col-md-4">
		    			<label for="horasA" class="form-label">Hora Acumulada</label>
		    			<input type="text" class="form-control" id="horasA" name="horasA" >
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

