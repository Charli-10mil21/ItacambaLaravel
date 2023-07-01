@extends('layouts.plantilla')

@section('title', 'Detalle_Maquinaria')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Detalle Maquinaria</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		{{-- <div class="row">
			{!! $chart->container() !!}

		</div> --}}
		<div class="row">
			<div class="col-md-6">
				<form class="row form m-3 needs-validation" action="{{route('maquinarias.update', $maquinaria->id)}}" method="POST">
				
					@csrf 
					@method('put')
						  <div class="col-md-6">
							<label for="nombre" class="form-label">nombre</label>
							<input type="text" class="form-control" id="nombre" name="nombre" value="{{$maquinaria->nombre}}"  required>
							<div class="valid-feedback">
							  Looks good!
							</div>
						  </div>
						  <div class="col-md-6">
							<label for="estado" class="form-label">Estado</label>
							<select class="form-select" id="estado" name="estado" required>
							  <option value="{{$maquinaria->estado}}">
									  {{$maquinaria->estado}}
							  </option>
							  <option>Disponible</option>
							  <option>En uso</option>
							  <option>Mantenimiento</option>
							</select>
							<div class="invalid-feedback">
							  Escoja un campo valido
							</div>
						</div>
						  <div class="col-md-5">
							<label for="horasA" class="form-label">Hora Acumulada</label>
							<input type="string" class="form-control" id="horasA" name="horasA" value="{{$maquinaria->horasA}}" required>
							<div class="valid-feedback">
							  Looks good!
							</div>
						  </div>
						
						<div class="row">
							<div class="col-12 col-md-3 my-3">
								<button class="btn btn-primary" type="submit">Guardar</button>
							  </div>
							  <div class="col-12 col-md-3 my-3">
								  <a href="{{route('maquinarias.index')}}" class="btn btn-danger btn-sm">
									  Salir
								  </a>
								
							  </div>
						</div>
						  
				</form>
			</div>
			<div class="col-md-6">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Hora Uso</th>
							<th scope="col">Fecha</th>
						</tr>
					</thead>
					<tbody>
						@foreach($maquinariaUso as $maquiUso)
						<tr>
							<td scope="row">{{$maquiUso->HoraUso}}</td>
							<td>{{$maquiUso->fecha}}</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
			</div>
			
		</div>
		
	</div>

{!! $chart->script() !!}
@endsection