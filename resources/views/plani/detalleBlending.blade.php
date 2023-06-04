@extends('layouts.plantillaPlanificacion')

@section('title', 'Detalle_Blending')

@section('content')

<div class="container py-4">
		<div class="row text-center">
			<h1>Blending</h1>
		</div>
		@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
		<div class="row">
			<form class="row form m-3 needs-validation" action="{{route('blendings.update', $item->id)}}" method="post">
				
				@csrf 
				@method('put')
				<div class="col-md-2">
					<label for="codigo" class="form-label">Codigo Produccion</label>
					<input type="text" class="form-control" id="codigo" name="codigo" value="{{$item->codigo}}" required>
					<div class="valid-feedback">
					  Looks good!
					</div>
				  </div>
				  <div class="col-md-2">
					<label for="fecha" class="form-label">Fecha </label>
					  <input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="inputGroupPrepend" value="{{$item->fecha}}" required>
					  <div class="invalid-feedback">
						inserte fecha
					  </div>
				</div>
				<div class="col-md-2">
					<label for="HoraIni" class="form-label">Hora de Inicio</label>
					  <input type="time" class="form-control" id="HoraIni" name="HoraIni" value="{{$item->HoraIni}}" required>
					  <div class="invalid-feedback">
						inserte hora 
					  </div>
				</div>
				<div class="col-md-2">
					<label for="materia_id" class="form-label">Tipo de Material</label>
					  <select name="materia_id" id="materia_id" class="form-control">
						<option value="{{$item->materia_id}} ">
							@foreach($materiales as $mate)
								@if($item->materia_id == $mate->id)
								{{$mate->name}}
								@endif
						  	@endforeach()
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
			
				{{-- <div class="col-md-2">
					<label for="toneladas" class="form-label">Toneladas</label>
					  <input type="text" class="form-control" id="toneladas" name="toneladas" onkeyup="PasarValor();" required>
					  <div class="invalid-feedback">
						inserte puntos validos
					  </div>
				</div>
				<div class="col-md-2">
					<label for="viajes" class="form-label">Viajes</label>
					  <input type="text" class="form-control" id="viajes" name="viajes" required>
					  <div class="invalid-feedback">
						inserte puntos validos
					  </div>
				</div> --}}
				<div class="col-md-2">
					<label for="planificacion_id" class="form-label">Planificacion</label>
					  <select name="planificacion_id" id="inputPlanificacion" class="form-control">
						<option value="{{$item->planificacion_id}} ">
							@foreach($planificaciones as $plan)
								@if($item->planificacion_id == $plan->id)
								{{$plan->name}}
								@endif
						  	@endforeach()
						</option>
						  @foreach($planificaciones as $plan)
							  <option value="{{$plan->id}}">{{$plan->name}}</option>
						  @endforeach()
						  </select>
					  <div class="invalid-feedback">
						inserte puntos validos
					  </div>
				</div>
					<div class="row">
						<div class="col-12 col-md-1 my-3">
							<button class="btn btn-primary" type="submit">Guardar</button>
						</div>
						<div class="col-12 col-md-1 my-3">
							<a href="{{route('blendings.index')}}" class="btn btn-danger btn-sm">
								Salir
							</a>
							
						</div>
						<div class="col-12 col-md-1 my-3">
							<a href="{{route('pdf',$item->id)}}" class="btn btn-danger btn-sm">
								Generar Pdf
							</a>
							
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-md-12">
						<h3>Detalle Blending</h3>
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">#id</th>
								<th scope="col">Nivel</th>
								<th scope="col">N# Voladura</th>
								<th scope="col">MgO</th>
								<th scope="col">Fe2O3</th>
								<th scope="col">SiO2</th>
								<th scope="col">Al2O3</th>
								<th scope="col">CaO</th>
								<th scope="col">FSC</th>
								<th scope="col">MS</th>
								<th scope="col">MA</th>
								<th scope="col">Toneladas</th>
								<th scope="col">Viajes</th>
								<th scope="col">Ver detalles</th>
								
							  </tr>
							</thead>
							<tbody>
								@foreach($descripciones as $item)
								<tr>
								  <th scope="row">{{$item->id}}</th>
								  <td>{{$item->topografia_id}}</td>
								  <td>{{$item->poligono_id}}</td>
								  <td>{{$item->laboratorio_id}}</td>
								  <td> lab</td>
								  <td> lab</td>
								  <td> lab</td>
								  <td> lab</td>
								  <td> lab</td>
								  <td>{{$item->fsc}}</td>
								  <td>{{$item->ms}}</td>
								  <td>{{$item->ma}}</td>
								  <td>{{$item->toneladas}}</td>
								  <td>{{$item->viajes}}</td>
								   <td>
									 <a href="{{route('descblendings.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
				  
									 <form action="{{route('descblendings.destroy',$item->id)}} " method="post" class="d-inline">
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
				</div>
				<div class="row">
					@if(session('mensaje')) 
						<div class="alert alert-success">
							{{session('mensaje')}}
						</div>
					@endif
					<button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						Registrar Nuevo Detalle
					</button>
					<div class="collapse" id="collapseExample">
						<div class="card card-body">
							<form class="row form m-3 needs-validation" action="{{route('descblendings.store')}}" method="post">
								@csrf
								
								<div class="col-md-6">
									<label for="blending_id" class="form-label">id Blending</label>
									<input type="text" class="form-control" id="blending_id" name="blending_id" value="{{$item->id}}" required>
									<div class="valid-feedback">
									Looks good!
									</div>
								</div>
								<div class="col-md-4">
									<label for="topografia_id" class="form-label">Nivel Topografico</label>
									<select name="topografia_id" id="topografia_id" class="form-control">
										<option value=" ">--Escoja nivel topografico--</option>
										@foreach($topografias as $topo)
											<option value="{{$topo->id}}">{{$topo->name}}</option>
										@endforeach()
										</select>
									<div class="invalid-feedback">
										inserte puntos validos
									</div>
								</div>
								<div class="col-md-4">
									<label for="poligono_id" class="form-label">N# Voladura</label>
									<select name="poligono_id" id="poligono_id" class="form-control">
										<option value=" ">--Escoja n# de Voladura--</option>
										@foreach($poligonos as $poli)
											<option value="{{$poli->id}}">{{$poli->name}}</option>
										@endforeach()
										</select>
									<div class="invalid-feedback">
										inserte puntos validos
									</div>
								</div>
								<div class="col-md-2">
									<label for="laboratorio_id" class="form-label">ID Lab.</label>
									<input type="text" class="form-control" id="laboratorio_id" name="laboratorio_id">
									<div class="invalid-feedback">
										inserte id
									</div>
								</div>
								<div class="col-md-2">
									<label for="fsc" class="form-label">FSC</label>
									<input type="text" class="form-control" id="fsc" name="fsc" required>
									<div class="invalid-feedback">
										inserte puntos validos
									</div>
								</div>
								<div class="col-md-2">
									<label for="ms" class="form-label">MS</label>
									<input type="text" class="form-control" id="ms" name="ms" required>
									<div class="invalid-feedback">
										inserte puntos validos
									</div>
								</div>
								<div class="col-md-2">
									<label for="ma" class="form-label">MA</label>
									<input type="text" class="form-control" id="ma" name="ma" required>
									<div class="invalid-feedback">
										inserte puntos validos
									</div>
								</div>
								<div class="col-md-2">
									<label for="toneladas" class="form-label">Toneladas</label>
									<input type="text" class="form-control" id="toneladas" name="toneladas" required>
									<div class="invalid-feedback">
										inserte puntos validos
									</div>
								</div>
							
								<div class="col-md-2">
									<label for="viajes" class="form-label">Viajes</label>
									<input type="text" class="form-control" id="viajes" name="viajes" required>
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


				{{-- <div class="col-md-12">
					<h3>Planificacion</h3>
					<table class="table">
						<thead>
						  <tr>
							<th scope="col">#id</th>
							<th scope="col">Nombre</th>
							<th scope="col">Presupuesto</th>
							<th scope="col">Produccion</th>
							<th scope="col">Fecha Inicio</th>
							<th scope="col">Fecha fin</th>
							<th scope="col">Duracion</th>
							<th scope="col">Usuario</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<th scope="row">{{$plani->id}}</th>
							<td>{{$plani->name}}</td>
							<td>{{$plani->presupuesto}}</td>
							<td>{{$plani->produccion}}</td>
							<td>{{$plani->fechaIni}}</td>
							<td>{{$plani->fechaFin}}</td>
							<td>{{$plani->duracion}}</td>
							<td><a href="{{route('usuarios.detalle',$plani->user_id)}} ">{{$plani->user_id}}</a></td>
						  </tr>
						</tbody>
					  </table>
				</div> --}}

				{{-- <h3>Nivel Topografico</h3>
				<div class="col-md-12">
					  <table class="table">
						<thead>
						  <tr>
							<th scope="col">#id</th>
							   <th scope="col">Nivel</th>
							   <th scope="col">Nº Voladura</th>
							
						  </tr>
						</thead>
						<tbody>
							@foreach($topografia as $top)
							  <tr>
								<th scope="row">{{$top->id}}</th>
								<td>{{$top->area}}</td>   
							  </tr>
							@endforeach
						</tbody>
					  </table>				 	
				  </div> --}}

				  <h1>Informes de Laboratorio</h1>

				<div class="row my-4">
				  <table class="table">
					<thead>
					  <tr>
						<th scope="col">#id</th>
						   <th scope="col">Fecha</th>
						   <th scope="col">Magnesio</th>			       	
						   <th scope="col">Hierro</th>
						   <th scope="col">Silicio</th>
						   <th scope="col">Aluminio</th>
						   <th scope="col">Calcio</th>
						   <th scope="col">Destino</th>
					  </tr>
					</thead>
					<tbody>
					 @foreach($laboratorios as $lab)
					  <tr>
						<th scope="row">{{$lab->id}}</th>
						<td>{{$lab->fecha}}</td>
						<td>{{$lab->mg}}</td>
						<td>{{$lab->fe}}</td>					        
						<td>{{$lab->si}}</td>
						<td>{{$lab->al}}</td>
						<td>{{$lab->ca}}</td>
						<td>{{$lab->destino}}</td>				        
					  </tr>
					  @endforeach()
					</tbody>
				  </table>
				  
				</div>
		</div>
		
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