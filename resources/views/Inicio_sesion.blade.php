<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Login Itacamba</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

	<style>
		body{
			background: rgb(0, 128, 255);
			background: linear-gradient(to bottom,rgb(255,255,255),rgb(227,124,74));
			height: 100%;
			min-height: 100%;
			font-family: Fredoka One rev=2;
		}
		html {
    		height: 100%;
		}
		.bg{
			background-image: url(img/login2.jpg) ;
			background-position: center center;

		}
		.bgform{
/*			background-color: rgb(178, 144, 135);*/
		}
		h2 {
				
				font-size: 55px;
				color: 	rgb(29, 86, 153);

		}

		label{
			font-size: 20px;
			color: 	rgb(29, 86, 153);
		}
		.btn{
			font-size: 20px;
			background-color: rgb(29, 86, 153) ;
			color: 	rgb(255, 255,255);

		}

					
	</style>
</head>
<body>

	<header class="d-flex">
		<div class=" container text-center mt-4 px-5">
		<img src="img/logo-itacamba.png" alt="">
		</div>
	</header>

	<div class="container w-75 my-4 rounded shadow">
		<div class="row align-items-strech">
			<div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded ">
				<!-- aqui entra la imagen -->
			</div>
			<div class="col bgform px-5 rounded-end ">
				
				<h2 class="fw-bold text-center py-4">Bienvenido</h2>

				<form action="" method="POST">
					@csrf
					<div class="mb-4 " >
						<label for="email" class="form-label fw-bold"> Usuario</label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="mb-4">
						<label for="password" class="form-label fw-bold"> Contraseña</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="mb-4 form-check">
						<input type="checkbox" name="conectado" class="form-check-input">
						<label for="conectado" class="form-check-label">Mantenerme Conectado</label>
					</div>
					@error('message')
						<p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">usuario incorrecto</p>
					@enderror

					<div class="d-grid my-3">
						<button type="submit" class="btn my-3">Iniciar Sesion
						</button>
					</div>
				</form>

				<!--login de redes sosciales-->
				<!-- <div class="container w-100 my-5">
						<div class="col">
							<button class="btn btn-outline-primary w-100 my-1">
								<div class="row align-items-center">
									<div class="col-2 d-none d-md-block">
										<img src=""  width="32" alt="">
									</div>
									<div class="col-12 col-md-10 text-center">
										Facebook
									</div>
									
								</div>
							</button>
						</div>
						<div class="col">
							<button class="btn btn-outline-danger w-100 my-1">
								<div class="row align-items-center ">
									<div class="col-2 d-none d-md-block  px-3">
										<img src="img/google.png"  width="25" alt="">
									</div>
									<div class="col-12 col-md-10 text-center p-1">
										Google
									</div>
								</div>
							</button>
						</div>
				</div> -->

			</div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>