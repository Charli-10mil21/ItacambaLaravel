@extends('layouts.plantillaProduccion')

@section('title', 'Viajes')

@section('content')
<div class="container py-4">
	<h1>
		Registro de Turno
	</h1>
		


		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		        <th scope="col">panel</th>		       	
		       	<th scope="col">Volqueta</th>
		       	<th scope="col">Nivel</th>
		        <th scope="col">Voladura</th>
		        <th scope="col">Nº Viajes</th>
		      	<th scope="col">Aumentar</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($viajes as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->panel_id}}</td>
		        <td>{{$item->volqueta_id}}</td>
		        <td>{{$item->nivel}}</td>
		        <td>{{$item->voladura}}</td>
		        <td>{{$item->n_viajes}}</td>		        
		        <td><button>+</button></td>
		         <td>
		           <a href="{{route('viajes.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form href="{{route('viajes.edit',$item->id)}}" method="post" class="d-inline">
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
		</div>


		<h3>Detalle de actividades</h3>
		<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		        <th scope="col">Panel_id</th>		        
		       	<th scope="col">Parada_id</th>
		       	<th scope="col">Detalle</th>
		        <th scope="col">hora inicio</th>
		        <th scope="col">hora fin</th>
		      	<th scope="col">registrar fin</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($actividades as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->panel_id}}</td>
		        <td>{{$item->parada_id}}</td>
		        <td><textarea>{{$item->detalle}}</textarea></td>
		        <td>{{$item->horaIni}}</td>
		        <td>{{$item->horaFin}}</td>
		        <td><button>Fin</button></td>
		        
		         <td>
		           <a href="{{route('actividades.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('actividades.destroy',$item->id)}} " method="post" class="d-inline">
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
		</div>

		<h3>Maquinaria</h3>
		<div class="row my-4">
			
				
			
		
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		        <th scope="col">Nombre</th>
		        <th scope="col">Estado</th>
		        <th scope="col">Hora Inicio</th>
		        <th scope="col">Hora Fin</th>
		        <th scope="col">Hora Efectiva</th>
		        <th scope="col">Horas Acumuladas</th>
		        <th scope="col">Acciones</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($maquinarias as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->nombre}}</td>
		        <td>{{$item->estado}}</td>

		        <td><input type="time" id="inicio{{$item->nombre}}"></td>
				<td><input type="time" id="final{{$item->nombre}}"></td>
				<td><input id="resultado{{$item->nombre}}"></td>
				<td id="res"></td>
				<td>{{$item->horasAcumuladas}}</td>
		         <td>
		           <a href="{{route('maquinarias.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('maquinarias.destroy',$item->id)}} " method="post" class="d-inline">
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
		</div>

		<div class="row">
				@if(session('mensaje')) 
					<div class="alert alert-success">
						{{session('mensaje')}}
					</div>
				@endif
			  <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			    Registrar Nuevo Viaje
			  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('viajes.store')}}" method="post">
			   		@csrf
		  			
				  	<div class="col-md-6">
				    	<label for="panel_id" class="form-label">panel_id</label>
				    	<input type="text" class="form-control" id="panel_id" name="panel_id" >
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-6">
				    	<label for="volqueta_id" class="form-label">Volqueta</label>
				    	<input type="text" class="form-control" id="volqueta_id" name="volqueta_id" >
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-6">
				    	<label for="nivel" class="form-label">Nivel</label>
				    	<input type="text" class="form-control" id="nivel" name="nivel" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-6">
				    	<label for="voladura" class="form-label">Voladura</label>
				    	<input type="text" class="form-control" id="voladura" name="voladura" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>


				 	<div class="col-12 my-3">
				    	<button class="btn btn-primary" type="submit">Registrar</button>
				  	</div>
				</form>
			  </div>
			</div>
		</div>

		<div class="row my-4">
				@if(session('mensaje')) 
					<div class="alert alert-success">
						{{session('mensaje')}}
					</div>
				@endif
			  <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
			    Registrar Nueva Actividad
			  </button>
			<div class="collapse" id="collapseExample2">
			  <div class="card card-body">
			   	<form class="row form m-3 needs-validation" action="{{route('actividades.store')}} " method="post">
			   		@csrf
		  			
				  	<div class="col-md-6">
				    	<label for="panel_id" class="form-label">panel_id</label>
				    	<input type="text" class="form-control" id="panel_id" name="panel_id" >
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-3">
				    	<label for="parada_id" class="form-label">parada_id</label>
				    	<input type="text" class="form-control" id="parada_id" name="parada_id" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-3">
				    	<a href="{{route('paradas.index')}} " class="btn btn-primary btn-sm">Nueva Parada</a>
				  	</div>
				  	<div class="col-md-6">
				    	<label for="detalle" class="form-label">Detalle</label>
				    	<input type="text" class="form-control" id="detalle" name="detalle" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-6">
				    	<label for="horaIni" class="form-label">hora Inicial</label>
				    	<input type="time" class="form-control" id="horaIni" name="horaIni" required>
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>
				  	<div class="col-md-6">
				    	<label for="horaFin" class="form-label">hora Final</label>
				    	<input type="time" class="form-control" id="horaFin" name="horaFin" >
				    	<div class="valid-feedback">
				      	Looks good!
				    	</div>
				  	</div>


				 	<div class="col-12 my-3">
				    	<button class="btn btn-primary" type="submit">Registrar</button>
				  	</div>
				</form>
			  </div>
			</div>
		</div>

		<div class="col-12 col-md-1 my-3">
	  		<a href="{{route('paneles.index')}} " class="btn btn-danger btn-sm">
	  			Terminar Control
	  		</a>	    	
		</div> 

		<!-- function multiplicar(){
  m1 = document.getElementById("multiplicando").value;
  m2 = document.getElementById("multiplicador").value;
  r = m1*m2;
  document.getElementById("resultado").value = r;

} -->
<script>
		var inicio = document.getElementById('inicio{{$item->nombre}}'),
    final = document.getElementById('final{{$item->nombre}}'),
    resultado = document.getElementById('resultado{{$item->nombre}}');

// en formato 24 hrs, ejemplo: '12:30', '03:47', '19:12'
function horaFija(hora) {
    const dia = new Date()
    dia.setHours(...hora.split(':'), 0)
    return dia
}


function calculaIntervalo(horaInicio, horaFinal) {
    let fechaInicio = horaFija(horaInicio),
        fechaFinal = horaFija(horaFinal)

    if (fechaFinal < fechaInicio) {
        fechaFinal.setDate(fechaFinal.getDate() + 1)
    }

    const diferencia = fechaFinal - fechaInicio,
        horas = Math.floor(diferencia / 36e5),
        minutos = Math.floor((diferencia % 36e5) / 6e4)
    return [horas, minutos]
}

inicio.addEventListener('change', e => resultado.value = calculaIntervalo(e.target.value, final.value))
final.addEventListener('change', e => resultado.value = calculaIntervalo(inicio.value, e.target.value))
	</script>

	
	</div>

	



@endsection

