<div>
    <div class="col-sm-4 my-1">
        <h3>Buscar por Fecha</h3>
        <input wire:model.live="fecha" type="date" class="form-control" >
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
                <th scope="col">Produccion</th>
                <th scope="col">Productividad</th>
                <th scope="col">Balanza Total</th>   
                <th scope="col">Ver detalle</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td >{{$item->id}}</td>
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
                    <td>{{$item->T_produccion}}</td>
                    <td>{{$item->productividad}}</td>
                    <td>{{$item->T_balanza}}</td>
                    <td>
                        <a href="{{route('producciones.edit',$item->id)}} " class="btn btn-warning btn-sm"><img src="img/editar2.png" alt="" height="25px"></a>

                        <form action="{{route('producciones.destroy',$item->id)}}" method="post" class="d-inline">
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
