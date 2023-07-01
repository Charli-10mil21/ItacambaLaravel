<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- ajax -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- ajax -->
	<title>@yield('title')</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('admin.css')}}">
	@livewireStyles
	<style>
		body{
			/*background: rgb(0, 128, 255);
			background: linear-gradient(to bottom ,rgb(255,255,255)65%,rgb(29,86,153));*/
		
		}
		html {
    		height: 100%;
		}
	</style>
</head>
<body>
	<header class="container-fluid">
		<nav class=" navbar navbar-expand-md navbar-light bg-light border-3 border-bottom border-dark">
  			<div class="container-fluid mt-3">
    			<a class="navbar-brand" href="{{route('admin')}}">

      				<img src="{{ asset('img/logo2.png') }}" alt="" width="190" height="90">
    			</a>
    			
    			<button type = "button" class = "navbar-toggler " data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
    				<span class="navbar-toggler-icon"></span>
    			</button>
    			<div id="MenuNavegacion" class="collapse navbar-collapse">
    				<ul class="navbar-nav ms-3">
    					<li class="nav-item"><a class="btn btn-outline-secondary mx-2 my-2" href="{{route('admin')}}">Inicio</a></li>
    					<li class="nav-item"><a class="btn btn-outline-secondary mx-2 my-2" href="{{route('planificacions.index')}}">Planificacion</a></li>
    					{{-- <li class="nav-item"><a class="nav-link" href="{{route('produccionIndex')}}">Producion</a></li> --}}
						<li class="nav-item"><a class="btn btn-outline-secondary mx-2 my-2" href="{{route('produccionIndex')}}">Producion</a></li>
    					<li class="nav-item  ">

							<form action="{{route('logout')}}" method="post">
								@csrf
								<button class="btn btn-outline-danger  mx-1 my-2" >
									Cerrar Sesion
								</button>	
							</form>
    						
    					</li>
    					
    				</ul>
    				
    			</div>
  			</div>
		</nav>
	</header>
	
	
		@yield('content')
		
		
	


		@livewireScripts
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>