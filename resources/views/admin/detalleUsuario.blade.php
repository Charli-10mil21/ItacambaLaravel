@extends('layouts.plantilla')

@section('title', 'Detalle_Usuario'. $usuario->name)

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Usuario</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('usuarios.editar', $usuario->id)}}" method="POST">
				
				@csrf 
				@method('put')
		  			<div class="col-md-6">
		    			<label for="nombre" class="form-label my-2 fw-bold">Nombres</label>
		    			<input type="text" class="form-control" id="nombre" name="nombre" value="{{$usuario->nombre}}"  required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
				  	<div class="col-md-6">
				    	<label for="apellido" class="form-label my-2 fw-bold">Apellidos</label>
				    	<input type="text" class="form-control" id="apellido" name="apellido" value="{{$usuario->apellido}}"required>
				    	<div class="valid-feedback">
				      	Looks good! 
				    	</div>
				  	</div>
					<div class="col-md-4">
					    <label for="email" class="form-label my-2 fw-bold">email</label>
					    <div class="input-group has-validation">
					      <span class="input-group-text" id="inputGroupPrepend">@</span>
					      <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" value="{{$usuario->email}}" required>
					      <div class="invalid-feedback">
					        Introduzca un correo valido.
					      </div>
					    </div>
					</div>
					<div class="col-md-4">
					    <label for="password" class="form-label my-2 fw-bold">Contraseña</label>
					    <div class="input-group has-validation">
					      <input type="password" class="form-control" id="password" name="password" value="{{$usuario->password}}"  required>
					      <div class="invalid-feedback">
					        Introduzca una contraseña
					      </div>
					    </div>
					</div>
					<div class="col-md-4">
					    <label for="campo" class="form-label my-2 fw-bold">Campo</label>
					    <select class="form-select" id="campo" name="campo" required>
					    	<!-- selected disabled Esto sirve para que una opcion no se pueda escoger -->
					      <option  value="{{$usuario->campo}}">
					      	{{$usuario->campo}}
					      </option>
					      <option>Administracion</option>
					      <option>Planificacion</option>
					      <option>Produccion</option>
					      <option>Expedicion</option>
					    </select>
					    <div class="invalid-feedback">
					      seleccione una opcion valida.
					    </div>
					</div>

					<div class="col-md-3">
					    <label for="validationCustom05" class="form-label my-2 fw-bold">Telefono</label>
					    <input type="number" class="form-control" id="validationCustom05" value="{{$usuario->telefono}}" required>
					    <div class="invalid-feedback">
					      introduzca un numero valido.
					    </div>
					</div>
					
				  	<div class="col-12 col-md-1 my-3">
				    	<button class="btn btn-primary" type="submit">Guardar</button>
				  	</div>
				  	<div class="col-12 col-md-1 my-3">
				  		<a href="{{route('usuarios')}}" class="btn btn-danger btn-sm">
				  			Salir
				  		</a>
				    	
				  	</div>
				</form>
		</div>
		
	</div>


@endsection