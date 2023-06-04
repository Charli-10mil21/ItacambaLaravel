@extends('layouts.plantillaProduccion')

@section('title', 'Produccion')

@section('content')
<div class="container py-4">
    <h1>
        Produccion
    </h1>
			
    <div class="row">
            @if(session('mensaje')) 
                <div class="alert alert-success">
                    {{session('mensaje')}}
                </div>
            @endif
            <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Nueva Registro de Produccion
            </button>
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
                {{-- <div class="col-md-4">
                    <label for="cinta" class="form-label">Cinta Transportadora</label>
                        <input type="text" class="form-control" id="cinta" name="cinta" required>
                        <div class="invalid-feedback">
                        inserte puntos validos
                        </div>
                </div> --}}
                <div class="col-12 my-3">
                    <button class="btn btn-primary" type="submit">Registrar</button>
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