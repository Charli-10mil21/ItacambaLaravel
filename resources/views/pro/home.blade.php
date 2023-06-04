@extends('layouts.plantillaProduccion')

@section('title', 'Produccion')

@section('content')

<div class="container py-4">
		<div class="row">

		<div class="row fila row-cols-1 justify-content-between">
			<div class="iconos col col-xs-12 col-sm-12 col-md-3 col-lg-2 user">
				<a href="{{route('producciones.index')}} " class="nav-link">
					<div class="text-center">
						<img src="img/panel.png " alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-success  my-3" >
								Produccion
						</button>
					</div>
				</a>
			</div>
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
			<div class="iconos col col-sm-12 col-md-3 col-lg-2 vol">
				<a href="{{route('volquetas.index')}} " class="nav-link">
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
			<div class="iconos col col-sm-12 col-md-3 col-lg-2 maqui">
				<a href="{{route('maquinarias.index')}} " class="nav-link">
					<div class="text-center">
						<img src="img/Perforacion.png" alt="" height="70px">
					</div>
					<div class="text-center">
						<button class="btn btn-outline-secondary  my-3" >
									Maquinaria
						</button>
					</div>
				</a>
			</div>
			
		</div>
	
	</div>

@endsection