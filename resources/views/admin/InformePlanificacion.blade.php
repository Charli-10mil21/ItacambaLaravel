@extends('layouts.plantilla')

@section('title', 'Informe Planificacion')


@section('content')

<div class="container py-4">
		<!-- <div class="row my-4">
		  <form action=" ">
		    <div class="form-row">
		      <div class="col-sm-4 my-1">
		        <input type="text" class="form-control" name="busqueda" value="Informe">
		      </div>
		      <div class="col auto my-1">
		        <input type="submit" class="btn btn-primary" value="Buscar">
		      </div>
		    </div>
		  </form>
		</div> -->
    <div class="row col-12">
    	<div class="chartBox">
        <canvas id="myChart"></canvas>
      </div>	
    </div>
      
	<div>
	<h1>Informes de PLanificacion</h1>
	</div>
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
			        <th scope="col">Duracion</th>
			        <th scope="col">Usuario</th>
			        <th scope="col">Ver detalle</th>
			      </tr>
			    </thead>
			    <tbody>

			      @foreach($planis as $item)
			      <tr>
			        <th scope="row">{{$item->id}}</th>
			        <td>{{$item->name}}</td>
			        <td>{{$item->presupuesto}}</td>
			        <td>{{$item->produccion}}</td>
			        <td>{{$item->fechaIni}}</td>
			        <td>{{$item->fechaFin}}</td>
			        <td>{{$item->duracion}}</td>
			        <td><a href="{{route('usuarios.detalle',$item->user_id)}}">{{$item->user_id}}</a></td>
			         <td>
			           <a href="{{route('InformePlaniDetalle',$item->id )}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
			         </td>
			      </tr>
			      @endforeach()
			    </tbody>
			  </table>
			  {{ $planis->links('pagination::bootstrap-4') }}
	</div>

	<!-- <div class="row col-12">
    	<div class="chartBox">
        <canvas id="myChart2"></canvas>
      </div>	
    </div> -->

	<div >
		<h1>Informes de Topografia</h1>
	</div>
	<div class="row my-4">
	  <table class="table">
	    <thead>
	      <tr>
	        <th scope="col">#id</th>
	       	<th scope="col">Nivel</th>
	       	<th scope="col">Levantamiento de Puntos</th>
	        <th scope="col">Replanteammiento de Puntos</th>
	        <th scope="col">Ver detalle</th>
	      </tr>
	    </thead>
	    <tbody>
	     @foreach($topos as $item)
	      <tr>
	        <th scope="row">{{$item->id}}</th>
	        <td>{{$item->area}}</td>
	        <td>{{$item->levPuntos}}</td>
	        <td>{{$item->replanPuntos}}</td>
	         <td>
	           <a href="{{route('topografias.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

	           
	         </td>
	      </tr>
	      @endforeach()
	    </tbody>
	  </table>
	  {{ $topos->links('pagination::bootstrap-4') }}
	</div>
	<div>
		<h1>Informes de Poligonos</h1>
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
		     @foreach($polis as $poli)
		      <tr>
		        <th scope="row">{{$poli->id}}</th>
		        <td>{{$poli->nombre}}</td>
		        <td>{{$poli->estado}}</td>
		        <td><a href="{{route('topografias.edit',$poli->topografia_id)}}">{{$poli->topografia_id}}</a></td>
		         <td>
		           <a href="{{route('poligonos.edit',$poli->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
		         </td>
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  {{ $polis->links('pagination::bootstrap-4') }}
	</div>
	<div>
		<h1>Informes de Explotacion</h1>
	</div>
	<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Volumen</th>
		       	<th scope="col">Tonelaje</th>
		        <th scope="col">tiempo</th>
		        <th scope="col">taladros</th>
		        <th scope="col">Area</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($explos as $explo)
		      <tr>
		        <th scope="row">{{$explo->id}}</th>
		        <td>{{$explo->volumen}}</td>
		        <td>{{$explo->tonelaje}}</td>
		        <td>{{$explo->tiempo}}</td>
		        <td>{{$explo->taladros}}</td>
		        <td><a href="{{route('topografias.edit',$explo->topografia_id)}}">{{$explo->topografia_id}}</a></td>
		         <td>
		           <a href="{{route('explotaciones.edit',$explo->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
		         </td>
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  {{ $explos->links('pagination::bootstrap-4') }}
	</div>
	<div>
		<h1>Informes de Perforacion</h1>
	</div>
	<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		        <th scope="col">Nº Perforacion</th>
		       	<th scope="col">Coordenadas</th>
		       	<th scope="col">Profundidad</th>
		        <th scope="col">Area Poligono</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($perfor as $perfo)
		      <tr>
		        <th scope="row">{{$perfo->id}}</th>
		        <td>{{$perfo->numero}}</td>
		        <td>{{$perfo->coordenadas}}</td>
		        <td>{{$perfo->profundidad}}</td>
		        <td><a href="{{route('poligonos.edit',$perfo->poligono_id)}}">{{$perfo->poligono_id}}</a></td>
		         <td>
		           <a href="{{route('perforaciones.edit',$perfo->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
		         </td>
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  {{ $perfor->links('pagination::bootstrap-4') }}
	</div>
	<div>
		<h1>Informes de Laboratorio</h1>
	</div>
	<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Fecha</th>
		       	<th scope="col">leyes
		       		<th scope="col2">MgO</th>
		       		<th scope="col2">Fe2O3</th>
		       		<th scope="col2">SiO2</th>
		       		<th scope="col2">Al2O3</th>
		       		<th scope="col2">CaO</th>
		       	</th>
		        <th scope="col">destino</th>
		        <th scope="col">Muestra</th>
		        <th scope="col">Blending</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($labs as $lab)
		      <tr>
		        <th scope="row">{{$lab->id}}</th>
		        <td>{{$lab->fecha}}</td>
		        <td> </td>
		        <td>{{$lab->mg}}</td>
		        <td>{{$lab->fe}}</td>
		        <td>{{$lab->si}}</td>
		        <td>{{$lab->al}}</td>
		        <td>{{$lab->ca}}</td>
		        <td>{{$lab->destino}}</td>
		        <td><a href="{{route('muestras.edit',$lab->muestra_id)}}">{{$lab->muestra_id}}</a></td>
		        <td><a href=" ">{{$lab->blending_id}}</a>
		        </td>
		         <td>
		           <a href="{{route('laboratorios.edit',$lab->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
		         </td>
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  {{ $labs->links('pagination::bootstrap-4') }}
		</div>
	<div>
		<h1>Informes de Blendings</h1>
	</div>
	<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Codigo Produccion</th>
		       	<th scope="col">Fecha</th>
	       		<th scope="col2">FSC</th>
	       		<th scope="col2">MS</th>
	       		<th scope="col2">MA</th>
	       		<th scope="col2">Toneladas Propuestas</th>
	       		<th scope="col2">Viajes</th>
		        <th scope="col">Planificacion</th>
		        <th scope="col">Nivel Topografico</th>		        
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($blends as $blend)
		      <tr>
		        <th scope="row">{{$blend->id}}</th>
		        <td>{{$blend->codigo}}</td>
		        <td>{{$blend->fecha}}</td>
		        <td>{{$blend->fsc}}</td>
		        <td>{{$blend->ms}}</td>
		        <td>{{$blend->ma}}</td>
		        <td>{{$blend->toneladas}}</td>
		        <td>{{$blend->viajes}}</td>
		        <td><a href="{{route('planificacions.edit',$blend->planificacion_id)}}">{{$blend->planificacion_id}}</a></td>
		        <td><a href="{{route('topografias.edit',$blend->topografia_id)}}">{{$blend->topografia_id}}</a></td>
		         <td>
		           <a href="{{route('blendings.edit',$blend->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
		         </td>
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  {{ $blends->links('pagination::bootstrap-4') }}
	</div>


</div>

<!-- esto es para jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- estos dos son para las graficas -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

<script>
	$.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
     }
 }); 

	//grafica de las planificaciones
	var planificaciones = [];
	var fechas=[];
	
	
		$.ajax({
				url: 'planificaciones/all',
				method: 'POST',
				data:{
					id:1,
					_token:$('input[name="_token"]').val()
			}
		}).done(function(res){

			var arreglo = JSON.parse(res);

			for(var x=0;x<arreglo.length;x++ ){
				planificaciones.push(arreglo[x].name);
				fechas.push([arreglo[x].fechaIni , arreglo[x].fechaFin]);
				
			}
			generarGrafica();
			
		});	

	//grafica de los poligonos	
	var niveles = [];
	var poligonos=[];
	
	
		$.ajax({
				url: 'poligonos/all',
				method: 'POST',
				data:{
					id:2,
					_token:$('input[name="_token"]').val()
			}
		}).done(function(res){


			var arreglo2 = JSON.parse(res);

			for(var i=0;i<arreglo2.length;i++ ){
			niveles.push(arreglo2[i].topografia_id,arreglo2[i].nombre,);
			}
			generarGraficaPoli();
			
			 
		});

  function generarGrafica()
  {
  	Chart.defaults.font.size = 17;
		// setup 
	    const data = {
	      labels: planificaciones,
	      datasets: [{
	        label: 'Diagrama de Planificaciones',
	        data: fechas,
	        backgroundColor: [
	          'rgba(255, 26, 104, 1)',
	          'rgba(54, 162, 235, 1)',
	          'rgba(255, 206, 86, 1)',
	          'rgba(75, 192, 192, 1)',
	          'rgba(153, 102, 255, 1)',
	          'rgba(255, 159, 64, 1)',
	          'rgba(0, 0, 0, 1)'
	        ],
	        borderColor: [
	          'rgba(255, 26, 104, 1)',
	          'rgba(54, 162, 235, 1)',
	          'rgba(255, 206, 86, 1)',
	          'rgba(75, 192, 192, 1)',
	          'rgba(153, 102, 255, 1)',
	          'rgba(255, 159, 64, 1)',
	          'rgba(0, 0, 0, 1)'
	        ],

	        //grosor de la barra
	        barPercentage:0.2,
	        borderWidth: 1,
	        borderSkipped: false
	      }]
	    };

	    //todayLine plugin block

	    const todayLine = {
	        id: 'todayLine',
	        beforeDatasetsDraw(chart,args,pluginOptions){
	          const{ ctx, data, chartArea: { top, bottom, left, right },scales: { x, y } } = chart;
	          ctx.save();
	          ctx.beginPath();
	          ctx.lineWidth = 2;
	          ctx.strokeStyle = 'rgba(255, 26, 104, 1)';
	          ctx.setLineDash([6,6]);
	          ctx.moveTo(x.getPixelForValue(new Date()), top);
	          ctx.lineTo(x.getPixelForValue(new Date()), bottom);
	          ctx.stroke();

	          ctx.setLineDash([]);
	            
	        }
	      }

	    // config 
	    const config = {
	      type: 'bar',
	      data,
	      options: {
	        indexAxis: 'y',
	        scales: {
	          x: {
	            type: 'time',
	            time: {
	              unit: 'day'
	            },
	            min: '2022-10-01',
	            max: '2022-12-31'
	          }
	         },
	         plugins: {
	            legend: {
	                display:true,
	                labels: {
	                	font: {
	                		size: 20
	                	}
	                }
	        	},
	        }
	     },
	      plugins:[todayLine]  
	    };

	    // render init block
	    const myChart = new Chart(
	      document.getElementById('myChart'),
	      config
	    );
  }

  function generarGraficaPoli()
  {
		// setup 
	    const data = {
	      labels: planificaciones,
	      datasets: [{
	        label: 'Diagrama de Planificaciones',
	        data: niveles,
	        backgroundColor: [
	          'rgba(255, 26, 104, 0.2)',
	          'rgba(54, 162, 235, 0.2)',
	          'rgba(255, 206, 86, 0.2)',
	          'rgba(75, 192, 192, 0.2)',
	          'rgba(153, 102, 255, 0.2)',
	          'rgba(255, 159, 64, 0.2)',
	          'rgba(0, 0, 0, 0.2)'
	        ],
	        borderColor: [
	          'rgba(255, 26, 104, 1)',
	          'rgba(54, 162, 235, 1)',
	          'rgba(255, 206, 86, 1)',
	          'rgba(75, 192, 192, 1)',
	          'rgba(153, 102, 255, 1)',
	          'rgba(255, 159, 64, 1)',
	          'rgba(0, 0, 0, 1)'
	        ],

	        //grosor de la barra
	        barPercentage:0.2,
	        borderWidth: 1,
	        borderSkipped: false
	      }]
	    };


	    // config 
	    const config = {
	      type: 'bubble',
	      data,
	      options: {
	        scales: {
		          x: {
		             beginAtZero: true
		            }
	     		}
 			}
	    };

	    // render init block
	    const myChart = new Chart(
	      document.getElementById('myChart2'),
	      config
	    );
  }
</script>



@endsection