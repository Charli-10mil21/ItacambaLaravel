<div>
    <div class="row my-4">
        <h2>Busqueda por:</h2>

        <div class="col-md-2 my-1">
            <p> Codigo Blending</p> 
            <select wire:model="filters.codigo" type="text" class="form-control">
                <option value="">--Escoje un Blending--</option>
                @foreach($blendings as $ble)
                    <option value="{{$ble->codigo}}">{{$ble->codigo}}</option>
                @endforeach()
            </select>
        </div>
        <div class="col-md-2 my-1">
            <p>Desde fecha: </p> 
            <input wire:model="filters.fromdate" type="date" class="form-control" >
        </div>
        <div class="col-md-2 my-1">
            <p>Hasta fecha: </p> 
            <input wire:model="filters.todate" type="date" class="form-control" >
        </div>
    </div>
    <div class="row my-4">
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">#id</th>
		       	<th scope="col">Codigo Produccion</th>
		       	<th scope="col">Fecha</th>
	       		<th scope="col2">Hora de Inicio</th>
				<th scope="col2">Estado</th>
	       		<th scope="col2">Tipo de material</th>
	       		<th scope="col2">Observaciones</th>
		        <th scope="col">Planificacion</th>		        
		        <th scope="col">Ver detalle</th>
		      </tr>
		    </thead>
		    <tbody>
		     @foreach($items as $item)
		      <tr>
		        <th scope="row">{{$item->id}}</th>
		        <td>{{$item->codigo}}</td>
		        <td>{{$item->fecha}}</td>
		        <td>{{$item->HoraIni}}</td>
				<td>{{$item->estado}}</td>
		        <td>{{$item->materia->name}}</td>
		        <td>{{$item->Observaciones}}</td>
		        <td><a href="{{route('planificacions.edit',$item->planificacion_id)}}">{{$item->planificacion->name}}</a></td>
		        <td>
		           <a href="{{route('blendings.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

		           <form action="{{route('blendings.destroy',$item->id)}} " method="post" class="d-inline">
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
		  {{ $items->links('pagination::bootstrap-4') }}
	</div>
</div>
