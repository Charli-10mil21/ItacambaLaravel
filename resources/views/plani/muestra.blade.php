@extends('layouts.plantillaPlanificacion')

@section('title', 'Muestra')

@section('content')
<div class="container py-4">
	<h1>
		Muestra
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
		       	<th scope="col">Cod Muestra</th>
		        <th scope="col">Perforacion</th>
		        <th scope="col">Voladura</th>		        
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->codigo}}</td>
		        <td><a href="{{route('perforaciones.edit',$item->perforacion_id)}}">{{$item->perforacion_id}}</a> </td>
		        <td><a href="{{route('poligonos.edit',$item->poligono_id)}}">{{$item->poligono_id}}</a> </td>
		         <td>
		           <a href="{{route('muestras.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('muestras.destroy',$item->id)}} " method="post" class="d-inline">
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
			    Registrar Nueva Muestra
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('muestras.store')}}" method="post">
			   		@csrf
		  			
				  	
					<div class="col-md-3">
					    <label for="codigo" class="form-label">Cod. Muestra</label>
					      <input type="text" class="form-control" id="codigo" name="codigo" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-3">
					    <label for="perforacion_id" class="form-label">Perforacion</label>
					      <select name="perforacion_id" id="perforacion_id" class="form-control">
  							<option value=" ">--Escoja el Area de perforacion--</option>
  							@foreach($perforaciones as $perfo)
  								<option value="{{$perfo->id}}">
  									{{$perfo->Codigo}}
  								</option>
  							@endforeach()
  							</select>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-3">
					    <label for="poligono_id" class="form-label">Poligono</label>
					      <select name="poligono_id" id="poligono_id" class="form-control">
  							<option value=" ">--Escoja el Area de la voladura--</option>
  							@foreach($poligonos as $poli)
  								<option value="{{$poli->id}}">
  									{{$poli->nombre}}
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
		<a href="{{route('materias.index')}}" class="nav-link">
		<button class="btn btn-primary m-4 " type="button"  >
			    Registrar Nueva Materia Prima
		</button>
		</a>



	
	</div>


@endsection