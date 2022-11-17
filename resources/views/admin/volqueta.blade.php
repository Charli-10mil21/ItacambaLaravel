@extends('layouts.plantilla')

@section('title', 'Volquetas')


@section('content')

<div class="container py-4">
		<div class="row my-4">
		  <form action=" ">
		    <div class="form-row">
		      <div class="col-sm-4 my-1">
		        <input type="text" class="form-control" name="busqueda" value="Nº Placa">
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
		        <th scope="col">Responsable</th>
		        <th scope="col">Placa</th>
		        <th scope="col">Peso Tara</th>
		        <th scope="col">Area destino</th>
		        <th scope="col">Estado</th>
		        <th scope="col">Acciones</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($volquetas as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->responsable}}</td>
		        <td>{{$item->placa}}</td>
		        <td>{{$item->pesoTara}}</td>
		        <td>{{$item->area}}</td>
		        <td>{{$item->estado}}</td>
		         <td>
		           <a href="{{route('volquetas.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('volquetas.destroy',$item->id)}} " method="post" class="d-inline">
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
		  {{ $volquetas->links('pagination::bootstrap-4') }}
		</div>

		<div class="row"> 
				@if(session('mensaje')) 
					<div class="alert alert-success">
						{{session('mensaje')}}
					</div>
				@endif
			  <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			    Registrar Nuevo Volqueta
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('volquetas.store')}}" method="POST">
			   		@csrf 

		  			<div class="col-md-12">
				    	<label for="responsable" class="form-label">Responsable</label>
				    	<input type="text" class="form-control" id="responsable" name="responsable"  required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
		  			<div class="col-md-4">
		    			<label for="placa" class="form-label">Placa</label>
		    			<input type="text" class="form-control" id="placa" name="placa" required>
		    			<div class="valid-feedback">
		      			Looks good!
		    			</div>
		  			</div>
		  			<div class="col-md-4">
					    <label for="peso" class="form-label">Peso Tara</label>
					    <div class="input-group has-validation">
					      <span class="input-group-text" id="inputGroupPrepend">KG</span>
					      <input type="text" class="form-control" id="peso" name="pesoTara" aria-describedby="inputGroupPrepend" required>
					      <div class="invalid-feedback">
					        Ingrese peso en kg
					      </div>
					    </div>
					</div>
					<div class="col-md-4">
					    <label for="area" class="form-label">Area destinado</label>
					    <select class="form-select" id="area" name="area" required>
					      <option selected disabled value="">
					      		Explotacion
					      </option>
					      <option>Produccion</option>
					      <option>Expedicion</option>
					    </select>
					    <div class="invalid-feedback">
					      Escoja un campo valido
					    </div>
					</div>

					<div class="col-md-3">
					    <label for="estado" class="form-label">Estado</label>
					    <select class="form-select" id="estado" name="estado" required>
					      <option>
					      		Disponible
					      </option>
					      <option>En uso</option>
					      <option>Mantenimiento</option>
					    </select>
					    <div class="invalid-feedback">
					      Escoja un campo valido
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

