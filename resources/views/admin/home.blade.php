@extends('layouts.plantilla')

@section('title', 'Administracion')


@section('content')

<div class="container py-4">
		<div class="row fila row-cols-1 justify-content-around">
			<div class="iconos col col-xs-12 col-sm-12 col-md-6 col-lg-3 user">
				<a href="{{route('usuarios')}}" class="nav-link">
					<div class="text-center">
						<img src="img/user.png" alt="" height="90px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-primary  my-3 " >
									Usuarios
						</button>
					</div>
				</a>
			</div>
			<div class="iconos col col-sm-12 col-md-6 col-lg-3 vol">
				<a href="{{route('volquetas.index')}}" class="nav-link">
					<div class="text-center">
						<img src="img/volqueta.jpg" alt="" height="90px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-warning  my-3" >
									Volquetas
						</button>
					</div>
				</a>
			</div>
			<div class="iconos col col-sm-12 col-md-6 col-lg-3 maqui">
				<a href="{{route('maquinarias.index')}}" class="nav-link">
					<div class="text-center">
						<img src="img/Maquinaria.png" alt="" height="90px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-secondary  my-3" >
									Maquinaria
						</button>
					</div>
				</a>
			</div>
		</div>

		
			
		<div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 justify-content-between">
			<div class="iconos col col-xs-12 col-sm-12 col-md-6 col-lg-6 user">
				<a href="{{route('InformePlani')}} " class="nav-link">
					<div class="text-center">
						<img src="img/informe.png" alt="" height="90px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-dark  my-3 " >
									Informe de Planificacion
						</button>
					</div>
				</a>
			</div>
			<div class="iconos col col-xs-12 col-sm-12 col-md-6 col-lg-6 user">
				<a href="{{route('InformeProduc')}} " class="nav-link">
					<div class="text-center">
						<img src="img/informe.png" alt="" height="90px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-dark  my-3 " >
									Informes de Produccion
						</button>
					</div>
				</a>
			</div>
		</div>
	
	</div>
@endsection