@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Blending')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Blending {{$item->id}}</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
				<div class="col-md-7">
					<form class="row form m-3 needs-validation" action="{{route('blendings.update', $item->id)}}" method="post">
					
						@csrf 
						@method('put')
						<div class="col-md-3">
							<label for="codigo" class="form-label" style="font-size: 20px">Cod. Produccion</label>
							<input type="text" class="form-control" id="codigo" name="codigo" value="{{$item->codigo}}" required>
							<div class="valid-feedback">
							Looks good!
							</div>
						</div>
						<div class="col-md-3">
							<label for="fecha" class="form-label">Fecha </label>
							<input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="inputGroupPrepend" value="{{$item->fecha}}" required>
							<div class="invalid-feedback">
								inserte fecha
							</div>
						</div>
						<div class="col-md-3">
							<label for="estado" class="form-label">Estado</label>
							<select class="form-select" id="estado" name="estado" required>
								<!-- selected disabled Esto sirve para que una opcion no se pueda escoger -->
								<option>{{$item->estado}}</option>
								<option>En Proceso</option>
							<option>Concluido</option>
							</select>
							<div class="valid-feedback">
							Looks good!
							</div>
						</div>
						<div class="col-md-3">
							<label for="HoraIni" class="form-label">Hora de Inicio</label>
							<input type="time" class="form-control" id="HoraIni" name="HoraIni" value="{{$item->HoraIni}}" required>
							<div class="invalid-feedback">
								inserte hora 
							</div>
						</div>
						<div class="col-md-3">
							<label for="materia_id" class="form-label">Material</label>
							<select name="materia_id" id="materia_id" class="form-control">
								<option value="{{$item->materia_id}} ">
									{{$item->materia->name}}
								</option>
								@foreach($materiales as $mate)
									<option value="{{$mate->id}}">{{$mate->name}}</option>
								@endforeach()
								</select>
							<div class="invalid-feedback">
								inserte puntos validos
							</div>
						</div>
						<div class="col-md-3">
							<label for="Observaciones" class="form-label">Observaciones</label>
							<input type="text" class="form-control" id="Observaciones" name="Observaciones" value="{{$item->Observaciones}}" required>
							<div class="invalid-feedback">
								inserte algun detalle 
							</div>
						</div>
					
						<div class="col-md-3">
							<label for="planificacion_id" class="form-label">Planificacion</label>
							<select name="planificacion_id" id="inputPlanificacion" class="form-control">
								<option value="{{$item->planificacion_id}} ">
									{{$item->planificacion->name}}
								</option>
								@foreach($planificaciones as $plan)
									<option value="{{$plan->id}}">{{$plan->name}}</option>
								@endforeach()
								</select>
							<div class="invalid-feedback">
								inserte puntos validos
							</div>
						</div>
						<div class="row my-2">
							<div class="col-md-3 ">
								<button class="btn btn-dark" type="submit">Guardar</button>
							</div>
							<div class="col-md-3 px-0">
								<a href="{{route('blendings.index')}}" class="btn btn-danger btn-sm">
									Salir
								</a>
								
							</div>
							
						</div>
					</form>
				</div>
				<div class=" col-md-5">
					@foreach ($blendingsTotal as $bleT)
					<div class="row my-4 py-2">
						<div class="col-md-4">
							<div class="card text-center" >
								<div class="card-body">
								<h3 class="card-title">FSC Total </h3>
								<p class="card-text">{{$bleT->FSC_total}}</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card text-center" >
								<div class="card-body">
								<h3 class="card-title">MS Total</h3>
								
								<p class="card-text">{{$bleT->MS_total}}</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card text-center" >
								<div class="card-body">
								<h3 class="card-title">MA Total</h3>
								
								<p class="card-text">{{$bleT->MA_total}}</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row my-4 py-2">
						<div class="col-md-6">
							<div class="card text-center" >
								<div class="card-body">
								<h3 class="card-title">Toneladas Total </h3>
								<p class="card-text">{{$bleT->toneladas_total}}</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card text-center" >
								<div class="card-body">
								<h3 class="card-title">Viajes Total</h3>
								<p class="card-text">{{$bleT->viajes_total}}</p>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			
		</div>
		<div class=" row my-2 ">
			<div class="col-md-2">
				<a href="{{route('pdf',$item->id)}}" class="btn btn-danger btn-sm">
					Generar Pdf
				</a>
			</div>
		</div>
		<div class="row my-2">
			<div class="col-md-3">
				<h2>Detalle Blending</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
						<th scope="col">Nivel</th>
						<th scope="col">N# Voladura</th>
						<th scope="col">SiO2</th>
						<th scope="col">Al2O3</th>
						<th scope="col">Fe2O3</th>
						<th scope="col">CaO</th>
						<th scope="col">MgO</th>
						<th scope="col">Na2O</th>
						<th scope="col">K2O</th>
						<th scope="col">Cl</th>
						<th scope="col">FSC</th>
						<th scope="col">MS</th>
						<th scope="col">MA</th>
						<th scope="col">Toneladas</th>
						<th scope="col">Viajes</th>
						<th scope="col">Eliminar</th>
						
						</tr>
					</thead>
					<tbody>
						@foreach($descripciones as $desc)
						<tr>
							<td scope="row">{{$desc->area}}</td>
							<td>{{$desc->Voladura}}</td>
							<td>{{$desc->SiO2}}</td>
							<td>{{$desc->Al2O3}}</td>
							<td>{{$desc->Fe2O3}}</td>
							<td>{{$desc->CaO}}</td>
							<td>{{$desc->MgO}}</td>
							<td>{{$desc->Na2O}}</td>
							<td>{{$desc->K2O}}</td>
							<td>{{$desc->Cl}}</td>
							<td>{{$desc->FSC}}</td>
							<td>{{$desc->MS}}</td>
							<td>{{$desc->MA}}</td>
							<td>{{$desc->toneladas}}</td>
							<td>{{$desc->viajes}}</td>
							<td>
								<form action="{{route('descblendings.destroy',$desc->id)}} " method="post" class="d-inline">
								@csrf 
								@method('delete')
								<button class="btn btn-danger btn-sm">
									<img src="{{asset('img/eliminar.png')}}" alt="" height="25px">
								</button>
								</form>
							</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
			</div>
		</div>

		<div class="row my-2">
			<div class="col-md-3">
				<a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
					Nuevo Detalle
					</a>
			</div>
			<div class="col-md-9">
				<h1>Informes de Laboratorio </h1>
			</div>
			<div class="collapse my-2" id="collapseExample2">
				<div class="card card-body">
					<form class="row form m-3 needs-validation" action="{{route('descblendings.store')}}" method="post">
						@csrf
						<div class="col-md-2">
							<label for="blending_id" class="form-label">id Blending {{$item->id}}</label>
							<input type="text" class="form-control" id="blending_id" name="blending_id" value="{{$item->id}}" required>
							<div class="valid-feedback">
							Looks good!
							</div>
						</div>
						<div class="col-md-3">
							<label for="topografia_id" class="form-label">Nivel Topografico</label>
							<select name="topografia_id" id="topografia_id" class="form-control">
								<option value=" ">--Escoja nivel topografico--</option>
								@foreach($topografias as $topo)
									<option value="{{$topo->id}}">{{$topo->area}}</option>
								@endforeach()
								</select>
							<div class="invalid-feedback">
								inserte puntos validos
							</div>
						</div>
						<div class="col-md-2">
							<label for="poligono_id" class="form-label">N# Voladura</label>
							<select name="poligono_id" id="poligono_id" class="form-control">
								<option value=" ">--Escoja n# de Voladura--</option>
								@foreach($poligonos as $poli)
									<option value="{{$poli->id}}">{{$poli->nombre}}</option>
								@endforeach()
								</select>
							<div class="invalid-feedback">
								inserte puntos validos
							</div>
						</div>
						<div class="col-md-2">
							<label for="laboratorio_id" class="form-label">ID Lab.</label>
							<select name="laboratorio_id" id="laboratorio_id" class="form-control">
								<option value=" ">--Escoja id de Laboratorio--</option>
								@foreach($laboratorios as $lab)
									<option value="{{$lab->id}}">{{$lab->id}}</option>
								@endforeach()
								</select>
							<div class="invalid-feedback">
								inserte id
							</div>
						</div>
						<div class="col-md-2">
							<label for="toneladas" class="form-label" >Toneladas</label>
							<input type="int" class="form-control" id="toneladas" oninput="PasarValor()" name="toneladas" required>
							<div class="invalid-feedback">
								inserte puntos validos
							</div>
						</div>
					
						<div class="col-md-2">
							<label for="viajes" class="form-label">Viajes</label>
							<input type="int" class="form-control" id="viajes" name="viajes" readonly>
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

		<div class="row my-4">
			@livewire('filter-laboratorios')
		</div>
		
</div>

<script>
	function PasarValor()
	{
		var input1 = document.getElementById('toneladas');
		var input2 = document.getElementById('viajes');

		var valor = input1.value; // Obtener el valor ingresado en el primer campo
		var resultado = Math.round(valor / 26); // Realizar el cálculo

		input2.value = resultado;

	}
</script>

@endsection