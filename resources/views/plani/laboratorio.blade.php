@extends('layouts.plantillaPlanificacion')

@section('title', 'Laboratorio')

@section('content')
<div class="container py-4">
	<h1>
		Laboratorio
	</h1>
		<div class="row my-4">
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
		</div>


		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Fecha</th>
		       	<th scope="col">leyes
		       		<th scope="col2">MgO</th>
		       		<th scope="col2">Fe2O3</th>
		       		<th scope="col2">SiO2</th>
		       		<th scope="col2">Al2O3</th>
		       		<th scope="col2">CaO</th>
		       	</th>
		        <th scope="col">destino</th>
		        <th scope="col">Muestra</th>
		        <th scope="col">Blending</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->fecha}}</td>
		        <td> </td>
		        <td>{{$item->mg}}</td>
		        <td>{{$item->fe}}</td>
		        <td>{{$item->si}}</td>
		        <td>{{$item->al}}</td>
		        <td>{{$item->ca}}</td>
		        <td>{{$item->destino}}</td>
		        <td><a href="{{route('muestras.edit',$item->muestra_id)}}">{{$item->muestra_id}}</a></td>
		        <td><a href=" ">{{$item->blending_id}}</a>
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
  									{{$mu->lote}}
  								</option>
  							@endforeach()
  							</select>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="mg" class="form-label">MgO</label>
					      <input type="text" class="form-control" id="mg" name="mg" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="fe" class="form-label">Fe2O3</label>
					      <input type="text" class="form-control" id="fe" name="fe" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="si" class="form-label">SiO2</label>
					      <input type="text" class="form-control" id="si" name="si" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="al" class="form-label">Al2O3</label>
					      <input type="text" class="form-control" id="al" name="al" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-2">
					    <label for="ca" class="form-label">CaO</label>
					      <input type="text" class="form-control" id="ca" name="ca" required>
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
					<div class="col-md-4">
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