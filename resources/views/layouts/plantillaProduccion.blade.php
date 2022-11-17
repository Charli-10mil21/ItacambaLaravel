<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="admin.css">
</head>
<body>
	<header class="container-fluid">
		<nav class=" navbar navbar-expand-md navbar-light bg-light border-3 border-bottom border-primary">
  			<div class="container-fluid">
    			<a class="navbar-brand" href="{{route('admin')}}">

      				<img src="img/logo-itacamba.png" alt="" width="250" height="50">
    			</a>
    			
    			<button type = "button" class = "navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
    				<span class="navbar-toggler-icon"></span>
    			</button>
    			<div id="MenuNavegacion" class="collapse navbar-collapse">
    				<ul class="navbar-nav ms-3">
    					<li class="nav-item"><a class="nav-link" href="{{route('producciones.index')}}">Inicio</a></li>
    					<li class="nav-item"><a class="nav-link" href=" ">Panel Central</a></li>
    					<li class="nav-item"><a class="nav-link" href=" ">Volquetas</a></li>
    					<li class="nav-item"><a class="nav-link" href=" ">Stock</a></li>
    					<!-- <li class="nav-item"><a class="nav-link" href="{{route('perforaciones.index')}}"> </a></li>
    					<li class="nav-item"><a class="nav-link" href="{{route('blendings.index')}}"> </a></li> -->
    					<li class="nav-item  ">
    						<button class="btn btn-outline-danger  my-1" >
									Cerrar Sesion
							</button>
    					</li>
    					
    				</ul>
    				
    			</div>
  			</div>
		</nav>
	</header>

	@yield('content')
		
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	
</body>
</html>