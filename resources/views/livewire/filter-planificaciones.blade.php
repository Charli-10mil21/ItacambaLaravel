<div>
    <div class="row my-4">
        <h2>Busqueda por:</h2>

        <div class="col-md-2 my-1">
            <p> Nombre</p> 
            <select wire:model.live="filters.name" type="text" class="form-control">
                <option value="">--Escoje una Planificacion--</option>
                @foreach($planificaciones as $plan)
                    <option value="{{$plan->name}}">{{$plan->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 my-1">
            <p> Encargado</p> 
            <select wire:model.live="filters.user" type="text" class="form-control">
                <option value="">--Escoje un Encargado--</option>
                @foreach($usuarios as $user)
                    @if ($user->campo == "Administracion")
                    <option value="{{$user->id}}">{{$user->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-2 my-1">
            <p>Desde fecha: </p> 
            <input wire:model.live="filters.fromdate" type="date" class="form-control" >
        </div>
        <div class="col-md-2 my-1">
            <p>Hasta fecha: </p> 
            <input wire:model.live="filters.todate" type="date" class="form-control" >
        </div>
    </div>
    <div class="row my-4" >
        <button wire:click="generarReporte" class="btn btn-primary col-md-2">
            generar reporte
        </button>
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
              <th scope="col">Toneladas</th>
              <th scope="col">Viajes</th>
              <th scope="col">Usuario</th>
              <th scope="col">Ver Detalle </th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->name}}</td>
              <td>{{$item->presupuesto}}</td>
              <td>{{$item->produccion}}</td>
              <td>{{$item->fechaIni}}</td>
              <td>{{$item->fechaFin}}</td>
              <td>{{$item->toneladas_t}}</td>
              <td>{{$item->viajes_t}}</td>
              <td>{{$item->user->nombre}}</td>
               <td>
                <a href="{{route('planificacions.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
                 <form action="{{route('planificacions.destroy',$item->id)}}" method="post" class="d-inline">
                  @csrf 
                  @method('delete')
                    <button class="btn btn-danger btn-sm">
                      <img src="img/eliminar.png" alt="" height="25px">
                    </button>
                 </form>
               </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $items->links('pagination::bootstrap-4') }}
      </div>
</div>
