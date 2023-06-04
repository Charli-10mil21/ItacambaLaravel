@extends('layouts.plantilla')

@section('title', 'Informe Produccion')


@section('content')
<div class="container py-4">
	<div>
		@livewire('filtros-informes-pro')
	</div>
	
</div>

@endsection