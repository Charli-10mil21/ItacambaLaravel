@extends('layouts.plantillaPlanificacion')

@section('title', 'Poligono')

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
			     Nuevo Poligono
			  </button>
		</div>
		<div class="col-md-3">
			<h1>
				Poligonos
			</h1>
		</div>
		<div class="collapse" id="collapseExample">
			<div class="card card-body">
			<form class="row form m-3 needs-validation" action="{{route('poligonos.store')}}" method="post">
				@csrf
				
				<div class="col-md-6">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" required>
					<div class="valid-feedback">
					Looks good!
					</div>
				</div>
				<div class="col-md-4">
					<label for="estado" class="form-label">Estado</label>
						<select name="estado" id="estado" class="form-control">
						<option value=" ">--Escoja el estado del poligono--</option>
						<option value="propuesto">Poligono Propuesto</option>
						<option value="perforando">Poligono en  Perforacion</option>
						<option value="fragmentado">Material Fragmentado</option>
					</select>
						<div class="invalid-feedback">
						seleccione opcion correcta
						</div>
				</div>
				<div class="col-md-6">
					<label for="area" class="form-label">Nivel Topografica</label>
					<select name="topografia_id" id="inputTopografia" class="form-control">
						<option value=" ">--Escoja el nivel para el poligono--</option>
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
		       	<th scope="col">Nombre</th>
		       	<th scope="col">Estado</th>
		        <th scope="col">Nivel</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->nombre}}</td>
		        <td>{{$item->estado}}</td>
		        <td><a href="{{route('topografias.edit',$item->topografia_id)}}">{{$item->topografia->area}}</a></td>
		         <td>
		           <a href="{{route('poligonos.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('poligonos.destroy',$item->id)}} " method="post" class="d-inline">
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