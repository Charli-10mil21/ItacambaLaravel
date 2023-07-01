<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="admin.css">
	<style>	
		 body {
            font-family: Arial, sans-serif;
        }
        
        h1 {
            color: #ff0000;
			font-size: 30px;
			text-align: center;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid #000000;
			font-size: 15px;
            padding: 4px;
            text-align: left;
        }
		/* .caja p {
			color: #393e44;
		} */
		.firmas{
			margin-top: 40px;
		}



	</style>	
</head>
<body>
	<header class="container-fluid ">
		<nav class=" navbar navbar-expand-md navbar-light bg-light border-3 border-bottom border-primary ">
  			<div class="container-fluid my-3">

      				<img src="img/logo2.png" alt="" width="200" height="70">
  			</div>
		</nav>
	</header>

	@yield('content')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>