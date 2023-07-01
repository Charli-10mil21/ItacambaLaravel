@extends('layouts.plantillaProduccion')

@section('title', 'Produccion')

@section('content')
<div class="container py-4">
    <h1>
        Produccion
    </h1>
	@if(session('mensaje')) 
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif

    {{-- <div  class="row my-4">
        <p>
            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Registrar Produccion
            </a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form class="row form m-3 needs-validation" action="{{route('producciones.store')}}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="blending_id" class="form-label">Blending</label>
                        <select name="blending_id" id="blending_id" class="form-control">
                            <option value=" ">--Escoje un Blending--</option>
                            @foreach($blendings as $ble)
                                <option value="{{$ble->id}}">{{$ble->codigo}}</option>
                            @endforeach()
                        </select>
                            <div class="invalid-feedback">
                            inserte puntos validos
                            </div>
                    </div>
                    <div class="col-12 my-3">
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
          </div>
    </div> --}}

    <div  class="row my-4">
        <p class="col-md-3">
            <a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Registrar Produccion
            </a>
        </p>
        <div class="col-md-3">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong">
                Visualizar Blendings
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Blendings</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                           
                            <thead>
                              <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Observaciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($blendings as $ble)
                              <tr>
                                <th scope="row">{{$ble->codigo}}</th>
                                <td>{{$ble->fecha}} </td>
                                <td>{{$ble->HoraIni}}</td>
                                <td>{{$ble->Observaciones}}</td>
                              </tr>
                              @endforeach()
                            </tbody>
                            
                          </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        {{-- esto es la pestaña que se colapsa --}}
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form class="row form m-3 needs-validation" action="{{route('producciones.store')}}" method="post">
                    @csrf
                    <div class="col-md-4">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    
                    <div class="col-md-3"> 
                        <label for="blending_id" class="form-label">Blending</label>
                        <select name="blending_id" id="blending_id" class="form-control">
                            <option value=" ">--Escoje un Blending--</option>
                                @foreach($blendings as $ble)
                                <option value="{{$ble->id}}">{{$ble->codigo}}</option>
                                @endforeach()
                        </select>
                            <div class="invalid-feedback">
                            inserte puntos validos
                            </div>
                    </div>
                    
                    <div class="col-12 my-3">
                        <button class="btn btn-dark" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
          </div>
          
    </div>
    

    <div class="row my-4">
        @livewire('filtro-produccion')
    </div>


</div>

@endsection