@extends('layouts.plantillaPlanificacion')

@section('title', 'Laboratorio')

@section('content')
<div class="container py-4">
	<h1>
		Laboratorio
	</h1>
		{{-- <div class="row my-4">
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
		</div> --}}


		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Fecha</th>
		       	<th scope="col">leyes
		       		<th scope="col2">SiO2</th>
		       		<th scope="col2">Al2O3</th>
		       		<th scope="col2">Fe2O3</th>
		       		<th scope="col2">CaO</th>
		       		<th scope="col2">MgO</th>
					<th scope="col2">Na2O</th>
					<th scope="col2">K2O</th>
					<th scope="col2">Cl</th>
					<th scope="col2">FSC</th>
					<th scope="col2">MS</th>
					<th scope="col2">MA</th>
		       	</th>
		        <th scope="col">destino</th>
		        <th scope="col">Muestra</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->fecha}}</td>
		        <td> </td>
		        <td>{{$item->SiO2}}</td>
				<td>{{$item->Al2O3}}</td>
				<td>{{$item->Fe2O3}}</td>
				<td>{{$item->CaO}}</td>
				<td>{{$item->MgO}}</td>
				<td>{{$item->Na2O}}</td>
				<td>{{$item->K2O}}</td>
				<td>{{$item->Cl}}</td>
				<td>{{$item->FSC}}</td>
				<td>{{$item->MS}}</td>
				<td>{{$item->MA}}</td>
		        <td>{{$item->destino}}</td>
		        <td><a href="{{route('muestras.edit',$item->muestra_id)}}">{{$item->muestra_id}}</a></td>
		        </td>
		         <td>
		           <a href="{{route('laboratorios.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('laboratorios.destroy',$item->id)}} " method="post" class="d-inline">
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
			    Registrar Nuevo Informe Laboratorio
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('laboratorios.store')}}" method="post">
			   		@csrf
		  			
				  	<div class="col-md-6">
				    	<label for="fecha" class="form-label">Fecha</label>
				    	<input type="date" class="form-control" id="fecha" name="fecha" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-4">
					    <label for="muestra_id" class="form-label">Nº muestra</label>
					      <select name="muestra_id" id="muestra_id" class="form-control">
  							<option value=" ">--Escoja el Nº de muestra--</option>
  							@foreach($muestras as $mu)
  								<option value="{{$mu->id}}">
  									{{$mu->codigo}}
  								</option>
  							@endforeach()
  							</select>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="SiO2" class="form-label">SiO2</label>
					      <input type="text" class="form-control" id="SiO2" name="SiO2">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="Al2O3" class="form-label">Al2O3</label>
					      <input type="text" class="form-control" id="Al2O3" name="Al2O3">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="Fe2O3" class="form-label">Fe2O3</label>
					      <input type="text" class="form-control" id="Fe2O3" name="Fe2O3">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="CaO" class="form-label">CaO</label>
					      <input type="text" class="form-control" id="CaO" name="CaO">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="MgO" class="form-label">MgO</label>
					      <input type="text" class="form-control" id="MgO" name="MgO">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="Na2O" class="form-label">Na2O</label>
					      <input type="text" class="form-control" id="Na2O" name="Na2O">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="K2O" class="form-label">K2O</label>
					      <input type="text" class="form-control" id="K2O" name="K2O">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="Cl" class="form-label">Cl</label>
					      <input type="text" class="form-control" id="Cl" name="Cl">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="FSC" class="form-label">FSC</label>
					      <input type="text" class="form-control" id="FSC" name="FSC">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="MS" class="form-label">MS</label>
					      <input type="text" class="form-control" id="MS" name="MS">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-1">
					    <label for="MA" class="form-label">MA</label>
					      <input type="text" class="form-control" id="MA" name="MA">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="destino" class="form-label">Destino</label>
					      <input type="text" class="form-control" id="destino" name="destino" aria-describedby="inputGroupPrepend" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					{{-- <div class="col-md-4">
					    <label for="blending_id" class="form-label">Blending</label>
					      <select name="blending_id" id="blending_id" class="form-control">
  							<option value=" ">--Escoja al Blending que pertenecera--</option>
  							@foreach($blendings as $ble)
  								<option value="{{$ble->id}}">
  									{{$ble->codigo}}
  								</option>
  							@endforeach()
  							</select>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div> --}}
					
				 	<div class="col-12 my-3">
				    	<button class="btn btn-primary" type="submit">Registrar</button>
				  	</div>
				</form>
			  </div>
			</div>
		</div>

		<div class="row my-5">
			@if(session('mensaje')) 
			@endif
			<button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
				Importar Informes de Laboratorio
			</button>
			<div class="collapse" id="collapseExample2">
				<div class="card card-body">
					<form class="row form m-3 needs-validation" action="{{route('importarStore')}}" method="post" enctype="multipart/form-data">
						@csrf
						
						<div class="col-md-4">
							<label for="file" class="form-label">seleccionar archivo</label>
							  <input type="file" class="form-control" name="file" accept=".csv, .xlsx"  required>
						</div>
						
						<div class="col-12 my-3">
							<button class="btn btn-primary" type="submit">importar archivo</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	
	</div>


@endsection