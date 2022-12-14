@extends('layouts.plantillaPlanificacion')

@section('title', 'Perforacion')

@section('content')
<div class="container py-4">
	<h1>
		Perforacion
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
		        <th scope="col">Nº Perforacion</th>
		       	<th scope="col">Coordenadas</th>
		       	<th scope="col">Profundidad</th>
		        <th scope="col">Area Poligono</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->numero}}</td>
		        <td>{{$item->coordenadas}}</td>
		        <td>{{$item->profundidad}}</td>
		        <td><a href="{{route('poligonos.edit',$item->poligono_id)}}">{{$item->poligono_id}}</a></td>
		         <td>
		           <a href="{{route('perforaciones.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('perforaciones.destroy',$item->id)}} " method="post" class="d-inline">
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
			    Registrar Nueva Perforacion
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('perforaciones.store')}}" method="post">
			   		@csrf
		  			
				  	<div class="col-md-6">
				    	<label for="numero" class="form-label">Nº Perforacion</label>
				    	<input type="int" class="form-control" id="numero" name="numero" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-6">
				    	<label for="coordenadas" class="form-label">Coordenadas</label>
				    	<input type="text" class="form-control" id="coordenadas" name="coordenadas" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
					<div class="col-md-4">
					    <label for="profundidad" class="form-label">Profundidad</label>
					      <input type="text" class="form-control" id="profundidad" name="profundidad" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="explotacion_id" class="form-label"> Area Poligono</label>
					      <select name="poligono_id" id="inputExplotacion" class="form-control">
  							<option value=" ">--Escoja el area de perforacion--</option>
  							@foreach($poligonos as $poli)
  								<option value="{{$poli->id}}">{{$poli->nombre}}</option>
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
		<a href="{{route('muestras.index')}}" class="nav-link">
		<button class="btn btn-primary m-4 " type="button"  >
			    Registrar Nueva Muestra
		</button>
		</a>



	
	</div>


@endsection