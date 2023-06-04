@extends('layouts.plantilla')

@section('title', 'Usuario')


@section('content')

<div class="container py-4">
		{{-- <div class="row my-4">
		  <form action=" ">
		    <div class="form-row">
		      <div class="col-sm-4 my-1">
		        <input type="text" class="form-control" name="busqueda" value="usuario">
		      </div>
		      <div class="col auto my-1">
		        <input type="submit" class="btn btn-primary" value="Buscar">
		      </div>
		    </div>
		  </form>
		</div> --}}
		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		        <th scope="col">Nombre</th>
		        <th scope="col">Apellidos</th>
		        <th scope="col">Campo</th>
		        <th scope="col">Telefono</th>
		        <th scope="col">Acciones</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($usuarios as $user)
		      <tr>
		        <th scope="row">{{$user->id}}</th>
		        <td>{{$user->nombre}}</td>
		        <td>{{$user->apellido}}</td>
		        <td>{{$user->campo}}</td>
		        <td>{{$user->telefono}}</td>
		         <td>
		           <a href="{{route('usuarios.detalle',$user->id)}}" class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('usuarios.eliminar',$user->id)}}" method="post" class="d-inline">
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
		</div>

		<div class="row">
				@if(session('mensaje')) 
					<div class="alert alert-success">
						{{session('mensaje')}}
					</div>
				@endif
			  <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			    Registrar Nuevo Usuario
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('usuarios.guardar')}}" method="POST">
			   		@csrf 

		  			<div class="col-md-6">
		    			<label for="nombre" class="form-label my-2">Nombres</label>
		    			<input type="text" class="form-control" id="nombre" name="nombre" required>
		    			<div class="valid-feedback"> 
		      			Looks good!
		    			</div>
		  			</div>
				  	<div class="col-md-6">
				    	<label for="apellido" class="form-label my-2">Apellidos</label>
				    	<input type="text" class="form-control" id="apellido" name="apellido" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
					<div class="col-md-4">
					    <label for="email" class="form-label my-2">email</label>
					    <div class="input-group has-validation">
					      <span class="input-group-text" id="inputGroupPrepend">@</span>
					      <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" required>
					      <div class="invalid-feedback">
					        Please choose a username.
					      </div>
					    </div>
					</div>
					<div class="col-md-4">
					    <label for="password" class="form-label my-2">Contraseña</label>
					    <div class="input-group has-validation">
					      <input type="password" class="form-control" id="password" name="password" required>
					      <div class="invalid-feedback">
					        Introduzca una contraseña
					      </div>
					    </div>
					</div>
					<div class="col-md-4">
					    <label for="campo" class="form-label my-2">Campo</label>
					    <select class="form-select" id="campo" name="campo" required>
					    	<!-- selected disabled Esto sirve para que una opcion no se pueda escoger -->
					      <option >
					      		Administracion
					      </option>
					      <option>Planificacion</option>
					      <option>Produccion</option>
					    </select>
					    <div class="invalid-feedback">
					      Please select a valid state.
					    </div>
					</div>

					<div class="col-md-3">
					    <label for="telefono" class="form-label my-2">Telefono</label>
					    <input type="number" class="form-control" id="telefono" name="telefono" required>
					    <div class="invalid-feedback">
					      ingrese un numero correcto
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