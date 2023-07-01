@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Planificacion')

@section('content')

<div class="container py-4">

		<div class="row text-center">
			<h1>Detalle Informe Planificacion</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('planificacions.update', $item->id)}}" method="post">
				@csrf 
				@method('put')
						<div class="col-md-2">
						<label for="name" class="form-label">Nombre</label>
						<input type="text" class="form-control" id="name" name="name" value="{{$item->name}}"  required>
						<div class="valid-feedback">
							Looks good!
						</div>
						</div>
						<div class="col-md-2">
						<label for="presupuesto" class="form-label">Presupuesto</label>
						<input type="text" class="form-control" id="presupuesto" name="presupuesto" value="{{$item->presupuesto}}" required>
						<div class="valid-feedback">
							Looks good!
						</div>
						</div>
						<div class="col-md-2">
						<label for="produccion" class="form-label">Produccion</label>
							<input type="text" class="form-control" id="produccion" name="produccion" value="{{$item->produccion}}" required>
							<div class="invalid-feedback">
							Ingrese peso en kg
							</div>
					</div>
					<div class="col-md-3">
						<label for="fechaIni" class="form-label">Fecha Inicio</label>
							<input type="date" class="form-control" id="fechaIni" name="fechaIni" value="{{$item->fechaIni}}" required>
							<div class="invalid-feedback">
							Ingrese peso en kg
							</div>
					</div>
					<div class="col-md-3">
						<label for="fechaFin" class="form-label">Fecha Fin</label>
							<input type="date" class="form-control" id="fechaFin" name="fechaFin" value="{{$item->fechaFin}}" required>
							<div class="invalid-feedback">
							Ingrese peso en kg
							</div>
					</div>
					<div class="col-md-2">
						<label for="user_id" class="form-label">Usuario</label>
						<select name="user_id" id="inputUser" class="form-control">
							<option value="{{$item->user_id}} ">{{$item->user->nombre}}</option>
							@foreach($users as $user)
								@if ($user->campo == "Administracion")
								<option value="{{$user->id}}">{{$user->nombre}}</option>
								@endif
							@endforeach()
						</select>
							<div class="invalid-feedback">
							Ingrese un dato existente
							</div>
					</div>
					<div class="row my-3">
						<div class="col-12 col-md-2">
							<button class="btn btn-dark" type="submit">Guardar</button>
							</div>
							<div class="col-12 col-md-2">
								<a href="{{route('InformePlani')}}" class="btn btn-danger btn-sm">
									Salir
								</a>
							</div>
					</div>
			</form>
		</div>
		<div class=" row my-2 ">
			<div class="col-md-2">
				<a href="{{route('pdfPlani',$item->id)}}" class="btn btn-danger btn-sm">
					Generar Pdf
				</a>
			</div>
		</div>
		<div class="row my-4">
			@foreach ($planiTotal as $planT)
			<div class="col-md-6">
				<div class="card text-center" >
					<div class="card-body">
					<h3 class="card-title">Toneladas Total </h3>
					<p class="card-text">{{$planT->toneladas_total}}</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card text-center" >
					<div class="card-body">
					<h3 class="card-title">Viajes Total</h3>
					<p class="card-text">{{$planT->viajes_total}}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="row my-2">
			<div class="col-md-6">
				{!! $chart->container() !!}
			</div>
			<div class="col-md-6">
				{!! $chart2->container() !!}
			</div>
			
		</div>

			
		<div class="row">
			<div class="col-md-12">
				<h3>Encargado</h3>
				<table class="table">
					<thead>
						<tr>
						<th scope="col">#id</th>
						<th scope="col">Nombre</th>
						<th scope="col">Apellidos</th>
						<th scope="col">Campo</th>
						<th scope="col">Telefono</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<th scope="row">{{$item->user->id}}</th>
						<td>{{$item->user->nombre}}</td>
						<td>{{$item->user->apellido}}</td>
						<td>{{$item->user->campo}}</td>
						<td>{{$item->user->telefono}}</td>
						</tr>
					</tbody>
					</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h3>Blendings</h3>
				<table class="table">
					<thead>
						<tr>
						<th scope="col">#id</th>
						<th scope="col">Codigo Produccion</th>
						<th scope="col">Fecha</th>
						<th scope="col">Estado</th>
						<th scope="col2">FSC</th>
						<th scope="col2">MS</th>
						<th scope="col2">MA</th>
						<th scope="col2">Toneladas Totales</th>
						<th scope="col2">Viajes</th>
						</tr>
					</thead>
					<tbody>
						@foreach($blendings as $blen)
						<tr>
						<th scope="row">{{$blen->id}}</th>
						<td>{{$blen->codigo}}</td>
						<td>{{$blen->fecha}}</td>
						<td>{{$blen->estado}}</td>
						<td>{{$blen->FSC_total}}</td>
						<td>{{$blen->MS_total}}</td>
						<td>{{$blen->MA_total}}</td>
						<td>{{$blen->toneladas_total}}</td>
						<td>{{$blen->viajes_total}}</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
			</div>
		</div>
		
</div>
{!! $chart->script() !!}
{!! $chart2->script() !!}
@endsection