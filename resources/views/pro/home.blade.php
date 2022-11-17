@extends('layouts.plantillaProduccion')

@section('title', 'Produccion')

@section('content')

<div class="container py-4">
		<div class="row">
			<h1>
				Produccion
			</h1>
			
		<div class="row">
				@if(session('mensaje')) 
					<div class="alert alert-success">
						{{session('mensaje')}}
					</div>
				@endif
			  <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			    Nueva Registro de Produccion
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('producciones.store')}}" method="post">
			   		@csrf
				  	<div class="col-md-6">
				    	<label for="fecha" class="form-label">Fecha</label>
				    	<input type="date" class="form-control" id="fecha" name="fecha" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
					<div class="col-md-4">
					    <label for="cinta" class="form-label">Cinta Transportadora</label>
					      <input type="text" class="form-control" id="cinta" name="cinta" required>
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
		  <form action=" ">
		    <div class="form-row">
		      <div class="col-sm-4 my-1">
		        <input type="text" class="form-control" name="busqueda" value="producciones">
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
		        <th scope="col">Cinta Transportadora</th>		     	
		        <th scope="col">Turno Nº1</th>
		        <th scope="col">Turno Nº2</th>
		        <th scope="col">Total Viajes</th>
		        <th scope="col">Horas Trabajadas</th>
		        <th scope="col">Horas Efectivas</th>
		        <th scope="col">Produccion</th>
		        <th scope="col">Productividad</th>
		        <th scope="col">Balanza Total</th>   
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		    @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->fecha}}</td>
		        <td>{{$item->cinta}}</td>
		        <td></td>
		        <td></td>
		        <td></td>
		        <td></td>
		        <td></td>
		        <td>
		         	<a href="{{route('producciones.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('producciones.destroy',$item->id)}}" method="post" class="d-inline">
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


		<div class="row fila row-cols-1 justify-content-between">
			<div class="iconos col col-xs-12 col-sm-12 col-md-3 col-lg-2 user">
				<a href="{{route('paneles.index')}} " class="nav-link">
					<div class="text-center">
						<img src="img/panel.png " alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-success  my-3" >
									Panel Central
						</button>
					</div>
				</a>
			</div>
			<div class="iconos col col-sm-12 col-md-6 col-lg-2 vol">
				<a href=" " class="nav-link">
					<div class="text-center">
						<img src="img/volqueta.jpg" alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-warning  my-3" >
									Volquetas
						</button>
					</div>
				</a>
			</div>
			<div class="iconos col col-sm-12 col-md-6 col-lg-2 maqui">
				<a href=" " class="nav-link">
					<div class="text-center">
						<img src="img/Perforacion.png" alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-secondary  my-3" >
									Chancadora
						</button>
					</div>
				</a>
			</div>
			
		</div>
	
	</div>

@endsection