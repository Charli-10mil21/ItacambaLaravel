@extends('layouts.plantillaPlanificacion')

@section('title', 'Planificacion')


@section('content')

<div class="container py-4">
	<div class="row">
			<h1>
				Proyectos
			</h1>	
		<div class="row">
				@if(session('mensaje')) 
					<div class="alert alert-success">
						{{session('mensaje')}}
					</div>
				@endif
			  <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			    Nueva Planificacion
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('planificacions.store')}}" method="post">
			   		@csrf
				  	<div class="col-md-6">
				    	<label for="name" class="form-label">Nombre</label>
				    	<input type="text" class="form-control" id="name" name="name" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
					<div class="col-md-4">
					    <label for="presupuesto" class="form-label">Presupuesto</label>
					      <input type="text" class="form-control" id="presupuesto" name="presupuesto" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="produccion" class="form-label">Produccion</label>
					      <input type="text" class="form-control" id="produccion" name="produccion" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="fechaIni" class="form-label">fecha_Inicial</label>
					      <input type="date" class="form-control" id="fechaIni" name="fechaIni" required>
					      <div class="invalid-feedback">
					        inserte puntos validos
					      </div>
					</div>
					<div class="col-md-4">
					    <label for="user_id" class="form-label">user</label>
					      <select name="user_id" id="inputUser" class="form-control">
	  							<option value=" ">--Escoja Encargado--</option>
	  							@foreach($users as $user)
	  								<option value="{{$user->id}}">{{$user->nombre}}</option>
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

		
		{{-- <div class="row my-4">
		  <form action=" ">
		    <div class="form-row">
		      <div class="col-sm-4 my-1">
		        <input type="text" class="form-control" name="busqueda" value="planificacion">
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
		        <th scope="col">Nombre</th>
		        <th scope="col">Presupuesto</th>
		        <th scope="col">Produccion</th>
		        <th scope="col">Fecha Inicio</th>
		        <th scope="col">Fecha fin</th>
		        <th scope="col">Duracion</th>
		        <th scope="col">Usuario</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->name}}</td>
		        <td>{{$item->presupuesto}}</td>
		        <td>{{$item->produccion}}</td>
		        <td>{{$item->fechaIni}}</td>
		        <td>{{$item->fechaFin}}</td>
		        <td>{{$item->duracion}}</td>
		        <td><a href="{{route('usuarios.detalle',$item->user_id)}} ">{{$item->user_id}}</a></td>
		         <td>
		           <a href="{{route('planificacions.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('planificacions.destroy',$item->id)}}" method="post" class="d-inline">
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


		<div class="row fila row-cols-1 justify-content-between">
			<div class="iconos col col-xs-12 col-sm-12 col-md-6 col-lg-2 user">
				<a href="{{route('topografias.index')}}" class="nav-link">
					<div class="text-center">
						<img src="img/topografia.png" alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-success  my-3" >
									Topografia
						</button>
					</div>
				</a>
			</div>
			<div class="iconos col col-xs-12 col-sm-12 col-md-6 col-lg-2 user">
				<a href="{{route('poligonos.index')}}" class="nav-link">
					<div class="text-center">
						<img src="img/topografia.png" alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-success  my-3" >
									Poligonos
						</button>
					</div>
				</a>
			</div>
			<div class="iconos col col-sm-12 col-md-6 col-lg-2 vol">
				<a href="{{route('explotaciones.index')}}" class="nav-link">
					<div class="text-center">
						<img src="img/explotacion.png" alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-warning  my-3" >
									Explotaciones
						</button>
					</div>
				</a>
			</div>
			<div class="iconos col col-sm-12 col-md-6 col-lg-2 maqui">
				<a href="{{route('perforaciones.index')}}" class="nav-link">
					<div class="text-center">
						<img src="img/Perforacion.png" alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-secondary  my-3" >
									Perforacion y Muestreo
						</button>
					</div>
				</a>
			</div>
			<div class="iconos col col-sm-12 col-md-6 col-lg-2 job">
				<a href="{{route('laboratorios.index')}}" class="nav-link">
					<div class="text-center">
						<img src="img/laboratorio.png" alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-info  my-3" >
									Laboratorio
						</button>
					</div>
				</a>
			</div>
			<div class="iconos col col-sm-12 col-md-6 col-lg-2 job">
				<a href="{{route('blendings.index')}}" class="nav-link">
					<div class="text-center">
						<img src="img/informe.png" alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-primary  my-3" >
									Blending
						</button>
					</div>
				</a>
			</div>
		</div>
	
	</div>
</div>

@endsection