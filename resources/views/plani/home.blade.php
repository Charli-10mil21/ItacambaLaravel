@extends('layouts.plantillaPlanificacion')

@section('title', 'Planificacion')


@section('content')

<div class="container py-4">
	<div class="row">
			<h1>
				Proyectos
			</h1>
			@if(session('mensaje')) 
					<div class="alert alert-success">
						{{session('mensaje')}}
					</div>
				@endif

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
		        <td><a href="{{route('usuarios.detalle',$item->user_id)}} ">{{$item->user->nombre}}</a></td>
		         <td>
		           <a href="{{route('planificacions.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
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
				<a href="{{route('muestras.index')}}" class="nav-link">
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