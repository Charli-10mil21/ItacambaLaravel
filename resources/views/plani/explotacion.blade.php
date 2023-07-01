@extends('layouts.plantillaPlanificacion')

@section('title', 'Explotacion')

@section('content')
<div class="container py-4">
	@if(session('mensaje')) 
			<div class="alert alert-success">
				{{session('mensaje')}}
			</div>
		@endif
	<div class="row">
		<div class="col-md-3">
			<button class="btn btn-secondary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				Nueva Explotacion
			  </button>
		</div>
		<div class="col-md-3 mx-3">
			<h1>
				Explotacion
			</h1>
		</div>
		<div class="collapse" id="collapseExample">
			<div class="card card-body">
				 <form class="row form m-3 needs-validation" action="{{route('explotaciones.store')}}" method="post">
					 @csrf
					
					<div class="col-md-6">
					  <label for="volumen" class="form-label">Volumen</label>
					  <input type="text" class="form-control" id="volumen" name="volumen" required>
					  <div class="valid-feedback">
						Looks good!
					  </div>
					</div>
				  <div class="col-md-4">
					  <label for="tonelaje" class="form-label">Tonelaje</label>
						<input type="text" class="form-control" id="tonelaje" name="tonelaje" required>
						<div class="invalid-feedback">
						  inserte puntos validos
						</div>
				  </div>
				  <div class="col-md-4">
					  <label for="fecha" class="form-label">fecha</label>
						<input type="date" class="form-control" id="fecha" name="fecha"  >
						<div class="invalid-feedback">
						  inserte puntos validos
						</div>
				  </div>
				  <div class="col-md-4">
					  <label for="taladros" class="form-label">Taladros</label>
						<input type="text" class="form-control" id="taladros" name="taladros" aria-describedby="inputGroupPrepend" required>
						<div class="invalid-feedback">
						  inserte puntos validos
						</div>
				  </div>
				  <div class="col-md-6">
					  <label for="area" class="form-label">Area Topografica</label>
						<select name="topografia_id" id="inputTopografia" class="form-control">
							<option value=" ">--Escoja el area para la explotacion--</option>
							@foreach($topografias as $topo)
								<option value="{{$topo->id}}">{{$topo->area}}</option>
							@endforeach()
						</select>
					  <div class="valid-feedback">
						Looks good!
					  </div>
					</div>
				   <div class="col-12 my-3">
					  <button class="btn btn-dark" type="submit">Registrar</button>
					</div>
			  </form>
			</div>
		  </div>
	</div>
		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Volumen</th>
		       	<th scope="col">Tonelaje</th>
		        <th scope="col">Fecha</th>
		        <th scope="col">taladros</th>
		        <th scope="col">Area</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->volumen}}</td>
		        <td>{{$item->tonelaje}}</td>
		        <td>{{$item->fecha}}</td>
		        <td>{{$item->taladros}}</td>
		        <td><a href="{{route('topografias.edit',$item->topografia_id)}}">{{$item->topografia_id}}</a></td>
		         <td>
		           <a href="{{route('explotaciones.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('explotaciones.destroy',$item->id)}} " method="post" class="d-inline">
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

		
	
	</div>


@endsection