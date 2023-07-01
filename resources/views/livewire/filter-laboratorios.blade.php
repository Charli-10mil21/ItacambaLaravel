<div>
    <div class="row my-4">
        <h2>Busqueda por:</h2>

        <div class="col-md-2 my-1">
            <p> Nivel Topografico</p> 
            <select wire:model="filters.topografia_id" type="text" class="form-control">
                <option value="">--Escoja nivel topografico--</option>
                @foreach($topografias as $topo)
                    <option value="{{$topo->area}}">{{$topo->area}}</option>
                @endforeach()
            </select>
        </div>
        <div class="col-md-2 my-1">
            <p>N° Voladura: </p> 
            <select wire:model="filters.poligono_id" type="text" class="form-control">
                <option value="">--Escoja n# de Voladura--</option>
                @foreach($poligonos as $poli)
                    <option value="{{$poli->nombre}}">{{$poli->nombre}}</option>
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
    <div class="row">
        <table>
            <thead>
                <tr>
                <th scope="col">Fecha</th>
                <th>Area</th>
                <th>Voladura</th>
                <th>#id Lab</th>			       	
                <th>SiO2</th>
                <th>Al2O3</th>
                <th>Fe2O3</th>
                <th>CaO</th>
                <th style="color: red">MgO</th>
                <th>Na2O</th>
                <th>K2O</th>
                <th>Cl</th>
                <th style="color: red">FSC</th>
                <th>MS</th>
                <th>MA</th>
                <th>Destino</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filtroslab as $fil)
                <tr>
                <th scope="row" style="font-size: 20px">{{$fil->fecha}}</th>
                <td>{{$fil->area}}</td>
                <td>{{$fil->voladura}}</td>
                <td>{{$fil->id}}</td>
                <td>{{$fil->SiO2}}</td>
                <td>{{$fil->Al2O3}}</td>
                <td>{{$fil->Fe2O3}}</td>
                <td>{{$fil->CaO}}</td>
                <td style="color: red">{{$fil->MgO}}</td>
                <td>{{$fil->Na2O}}</td>
                <td>{{$fil->K2O}}</td>
                <td>{{$fil->Cl}}</td>
                <td style="color: red">{{$fil->FSC}}</td>
                <td>{{$fil->MS}}</td>
                <td>{{$fil->MA}}</td>
                <td>{{$fil->destino}}</td>				        
                </tr>
                @endforeach()
            </tbody>
        </table>
        {{ $filtroslab->links('pagination::bootstrap-4') }}
    </div>
</div>
