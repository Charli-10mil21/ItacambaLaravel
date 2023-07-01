@extends('layouts.plantilla')

@section('title', 'Informe Planificacion')


@section('content')
<div class="container py-4">
	<div class="row my-2">
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="col-md-3">
			<a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
				Nuevo Proyecto
			</a>
		</div>
		<div class="col-md-9">
			<h1>
				Proyectos
			</h1>	
		</div>
		<div class="collapse" id="collapseExample">
			<div class="card card-body">
				 <form class="row form m-3 needs-validation" action="{{route('planificacions.store')}}" method="post">
					 @csrf
					<div class="col-md-3">
					  <label for="name" class="form-label">Nombre</label>
					  <input type="text" class="form-control" id="name" name="name" required>
					  <div class="valid-feedback">
						Looks good!
					  </div>
					</div>
				  <div class="col-md-3">
					  <label for="presupuesto" class="form-label">Presupuesto</label>
						<input type="text" class="form-control" id="presupuesto" name="presupuesto" required>
						<div class="invalid-feedback">
						  inserte puntos validos
						</div>
				  </div>
				  <div class="col-md-3">
					  <label for="produccion" class="form-label">Produccion</label>
						<input type="text" class="form-control" id="produccion" name="produccion" required>
						<div class="invalid-feedback">
						  inserte puntos validos
						</div>
				  </div>
				  <div class="col-md-3">
					  <label for="fechaIni" class="form-label">fecha_Inicial</label>
						<input type="date" class="form-control" id="fechaIni" name="fechaIni" required>
						<div class="invalid-feedback">
						  inserte puntos validos
						</div>
				  </div>
				  <div class="col-md-3">
					  <label for="user_id" class="form-label">user</label>
						<select name="user_id" id="inputUser" class="form-control">
								<option value=" ">--Escoja Encargado--</option>
								@foreach($users as $user)
									@if ($user->campo == "Administracion")
									<option value="{{$user->id}}">{{$user->nombre}}</option>
									@endif
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

	<div class="row my-2">
			<div class="col-md-4">
				<div class="card text-center" >
					<div class="card-body">
					<h3 class="card-title">Presupuesto Total </h3>
					<p class="card-text">{{$presuTotal}}</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-center" >
					<div class="card-body">
					<h3 class="card-title">Toneladas Total </h3>
					<p class="card-text">{{$toneladasTotal}}</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-center" >
					<div class="card-body">
					<h3 class="card-title">Viajes Total</h3>
					<p class="card-text">{{$viajesTotal}}</p>
					</div>
				</div>
			</div>
	</div>


	<div>
		@livewire('filter-planificaciones')
	</div>
	
</div>




@endsection