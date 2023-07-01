@extends('layouts.plantillaPlanificacion')

@section('title', 'Blending')

@section('content')
<div class="container py-4">
	<div class="row">
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="col-md-3">
			<a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
				Nuevo Blending
				</a>
		</div>
		<div class="col-md-9">
			<h1>
				Blending
			</h1>
		</div>
		<div class="collapse my-2" id="collapseExample">
			<div class="card card-body">
				 <form class="row form m-3 needs-validation" action="{{route('blendings.store')}}" method="post">
					 @csrf
					
					<div class="col-md-3">
					  <label for="codigo" class="form-label">Cod. Produccion</label>
					  <input type="text" class="form-control" id="codigo" name="codigo" required>
					  <div class="valid-feedback">
						Looks good!
					  </div>
					</div>
					<div class="col-md-2">
					  <label for="fecha" class="form-label">Fecha </label>
						<input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="inputGroupPrepend" required>
						<div class="invalid-feedback">
						  inserte fecha
						</div>
				  </div>
				  
				  <div class="col-md-3">
					  <label for="HoraIni" class="form-label">Hora Inicio</label>
						<input type="time" class="form-control" id="HoraIni" name="HoraIni" required>
						<div class="invalid-feedback">
						  inserte hora 
						</div>
				  </div>
				  <div class="col-md-3">
					  <label for="estado" class="form-label my-2">Estado</label>
					  <select class="form-select" id="estado" name="estado" required>
						  <!-- selected disabled Esto sirve para que una opcion no se pueda escoger -->
						<option>En Proceso</option>
						<option>Concluido</option>
					  </select>
					  <div class="invalid-feedback">
						Please select a valid state.
					  </div>
				  </div>
				  <div class="col-md-2">
					  <label for="materia_id" class="form-label">Material</label>
						<select name="materia_id" id="inputmateria" class="form-control">
							<option value=" ">--Escoja tipo de material--</option>
							@foreach($materiales as $mate)
								<option value="{{$mate->id}}">{{$mate->name}}</option>
							@endforeach()
							</select>
						<div class="invalid-feedback">
						  inserte puntos validos
						</div>
				  </div>
				  <div class="col-md-4">
					  <label for="Observaciones" class="form-label">Observaciones</label>
						<input type="text" class="form-control" id="Observaciones" name="Observaciones" required>
						<div class="invalid-feedback">
						  inserte algun detalle 
						</div>
				  </div>
				  <div class="col-md-2">
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

				   <div class="col-12 my-3">
					  <button class="btn btn-primary" type="submit">Registrar</button>
					</div>
			  </form>
			</div>
		</div>
	</div>
	@livewire('filter-blendings')

	
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