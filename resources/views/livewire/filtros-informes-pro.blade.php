<div>
    {{-- <div class="row my-4">
        <h2>Graficar Desde:</h2>
        <div class="col-md-2 my-1">
            <p>Desde fecha: </p> 
            <input wire:model="fechas.fromdate" type="date" class="form-control" >
        </div>
        <div class="col-md-2 my-1">
            <p>Hasta fecha: </p> 
            <input wire:model="fechas.todate" type="date" class="form-control" >
        </div>
    </div> --}}

    


    <div class="row my-4">
        <h2>Busqueda por:</h2>

        <div class="col-md-2 my-1">
            <p> Codigo Blending</p> 
            <select wire:model="filters.blending_id" type="text" class="form-control">
                <option value="">--Escoje un Blending--</option>
                @foreach($blendings as $ble)
                    <option value="{{$ble->id}}">{{$ble->codigo}}</option>
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
            <th scope="col">Fecha</th> 
            <th scope="col">Blending</th> 
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
        @foreach($items as $item)
            <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->fecha}}</td>
            <td>
                @foreach ($blendings as $ble)
                    @if ($ble->id == $item->blending_id)
                        {{$ble->codigo}}
                    @endif
                @endforeach
            </td>
            <td>{{$item->T_viajes}}</td>
            <td>{{$item->T_horas}}</td>
            <td>{{$item->H_efectivas}}</td>
            <td>{{$item->T_produccion}}</td>
            <td>{{$item->productividad}}</td>
            <td>{{$item->T_balanza}}</td>
            <td>
                <a href="{{route('producciones.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>
            </td>
            </tr>
            @endforeach()
        </tbody>
        </table>
        {{ $items->links('pagination::bootstrap-4') }}
    </div>

    
</div>
