@extends('layouts.plantillaProduccion')

@section('title', 'Panel_Central')

@section('content')
<div class="container py-4">
	<h1>
		Panel Central
	</h1>
		<div class="row my-4">
		  <form action=" ">
		    <div class="form-row">
		      <div class="col-sm-4 my-1">
		        <input type="text" class="form-control" name="busqueda" >
		      </div>
		      <div class="col auto my-1">
		        <input type="submit" class="btn btn-primary" value="Buscar registro">
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
		       	<th scope="col">Nombre Encargado</th>
		       	<th scope="col">Turno</th>		       	
		       	<th scope="col">Blending_id</th>		        
		        <th scope="col">Horas Efectivas</th>
		        <th scope="col">Nº Volquetas</th>
		        <th scope="col">Viajes total</th>
		        <th scope="col">Toneladas</th>		        
		        <th scope="col">Balanza Integrada</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		       @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->fecha}}</td>
		        <td>{{$item->nombre}}</td>
		        <td>{{$item->turno}}</td>
		        <td>{{$item->blending_id}}</td>
		        <td>{{$item->HorasEfectivas}}</td>
		        <td>{{$item->N_volquetas}}</td>
		        <td>{{$item->N_viajes}}</td>
		        <td>{{$item->toneladas_total}}</td>
		        <td>{{$item->balanza}}</td>
		        <td>
		        	<a href="{{route('paneles.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px">Control</a>

		           <form action="{{route('paneles.destroy',$item->id)}}" method="post" class="d-inline">
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
			    Registrar Nueva Turno
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('paneles.store')}}" method="post">
			   		@csrf
				  	<div class="col-md-6">
				    	<label for="fecha" class="form-label">Fecha</label>
				    	<input type="date" class="form-control" id="fecha" name="fecha" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
					<div class="col-md-4">
					    <label for="nombre" class="form-label">Nombre Encargado</label>
					      <input type="text" class="form-control" id="nombre" name="nombre" required>
					      <div class="invalid-feedback">
					        inserte nombre valido
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="turno" class="form-label">Turno</label>
					      <input type="text" class="form-control" id="turno" name="turno" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="blending_id" class="form-label">Blending</label>
					      <input type="text" class="form-control" id="blending_id" name="blending_id">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="produccione_id" class="form-label">Produccion</label>
					      <input type="text" class="form-control" id="produccione_id" name="produccione_id">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="topografia_id" class="form-label">Nivel</label>
					      <input type="text" class="form-control" id="topografia_id" name="topografia_id">
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="N_volquetas" class="form-label">Cantidad Volquetas</label>
					      <input type="text" class="form-control" id="N_volquetas" name="N_volquetas" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>

					<div class="col-12 my-3">
				    	<button class="btn btn-primary" type="submit">Registrar</button>
				  	</div>
				</form>
					<!-- <a href="{{route('viajes.index')}} ">
						<div class="col-12 my-3">
				    		<button class="btn btn-primary" type=" ">Iniciar Control</button>
				  		</div>	
					</a> -->
			  </div>
			</div>
		</div>
	
	</div>


@endsection