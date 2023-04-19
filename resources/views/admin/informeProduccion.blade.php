@extends('layouts.plantilla')

@section('title', 'Informe Produccion')


@section('content')
<div class="container py-4">

	<div class="row col-12">
    	<div class="chartBox">
        <canvas id="myChartProduc"></canvas>
      </div>	
    </div>
	<div>
	<h1> Informes de Produccion </h1>
	</div>

	<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		        <th scope="col">Fecha</th> 
		        <th scope="col">Cinta Transportadora</th>		     	
		        <th scope="col">Total Viajes</th>
		        <th scope="col">Horas Trabajadas</th>
		        <th scope="col">Horas Efectivas</th>
		        <th scope="col">Produccion</th>
		        <th scope="col">Productividad</th>
		        <th scope="col">Balanza Total</th>   
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		    @foreach($producs as $pro)
		      <tr>
		        <th scope="row">{{$pro->id}}</th>
		        <td>{{$pro->fecha}}</td>
		        <td>{{$pro->cinta}}</td>
		        <td>{{$pro->T_viajes}}</td>
		        <td>{{$pro->T_horas}}</td>
		        <td>{{$pro->H_efectivas}}</td>
		        <td>{{$pro->T_produccion}}</td>
		        <td>{{$pro->productividad}}</td>
		        <td>{{$pro->T_balanza}}</td>
		        <td>
		         	<a href="{{route('producciones.edit',$pro->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
		        </td>
		      </tr>
		     @endforeach()
		    </tbody>
		  </table>
		  {{ $producs->links('pagination::bootstrap-4') }}
	</div>

	<div>
		<h1> Informes de Control de Panel Central</h1>
	</div>
	<div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Fecha</th>
		       	<th scope="col">Nombre Encargado</th>
		       	<th scope="col">Turno</th>		       	
		       	<th scope="col">Blending_id</th>		        
		        <th scope="col">Horas Efectivas</th>
		        <th scope="col">Nº Volquetas</th>
		        <th scope="col">Viajes total</th>
		        <th scope="col">Toneladas</th>		        
		        <th scope="col">Balanza Integrada</th>
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		       @foreach($paneles as $panel)
		      <tr>
		        <th scope="row">{{$panel->id}}</th>
		        <td>{{$panel->fecha}}</td>
		        <td>{{$panel->nombre}}</td>
		        <td>{{$panel->turno}}</td>
		        <td>{{$panel->blending_id}}</td>
		        <td>{{$panel->HorasEfectivas}}</td>
		        <td>{{$panel->N_volquetas}}</td>
		        <td>{{$panel->N_viajes}}</td>
		        <td>{{$panel->toneladas_total}}</td>
		        <td>{{$panel->balanza}}</td>
		        <td>
		        	<a href="{{route('paneles.edit',$panel->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px">Control</a>
		        </td>
		      </tr>
		      @endforeach()
		    </tbody>
		  </table>
		  {{ $paneles->links('pagination::bootstrap-4') }}
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
	var producciones = [];
	var fecha=[];
	
	
		$.ajax({
				url: 'producciones/pro',
				method: 'POST',
				data:{
					id:3,
					_token:$('input[name="_token"]').val()
			}
		}).done(function(res){

			var arreglo = JSON.parse(res);

			for(var x=0;x<arreglo.length;x++ ){
				producciones.push(arreglo[x].T_produccion);
				fecha.push(arreglo[x].fecha);
				
			}
			generarGrafica2();
			
		});

	function generarGrafica2()
  {
  	Chart.defaults.font.size = 20;
		// setup 
    const data = {
      labels: fecha,
      datasets: [{
        label: 'Produccion por dia',
        data: producciones,
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
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
          x: {
	            type: 'time',
	            time: {
	              unit: 'day'
	            },
	            min: '2022-11-01',
	            max: '2022-12-31'
	          }
        },
        plugins: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 25,
                    }
                }
            }
        }
      }
    };

	    // render init block
	    const myChart = new Chart(
	      document.getElementById('myChartProduc'),
	      config
	    );
  }


</script>


@endsection