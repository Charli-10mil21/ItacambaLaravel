@extends('layouts.plantillaPdf')

@section('title', 'Informe Produccion')


@section('content') 

	<h1>Blending Mina </h1>
	<p> Codigo de Produccion : <strong>{{$item->codigo}}</strong> Estado: <strong>{{$item->estado}}</strong></p>
	<p>Fecha Programada : <strong>{{$item->fecha}}</strong> </p>
	<p>Inicio a horas : <strong> {{$item->HoraIni}}</strong>  aproximadamente </p>
	<p>Tipo de Material : <strong> {{$item->materia->name}} </strong> </p>
	
	<table class="table">
		<thead>
			<tr>
			<th scope="col">Nivel</th>
			<th scope="col">N# Voladura</th>
			<th scope="col">SiO2</th>
			<th scope="col">Al2O3</th>
			<th scope="col">Fe2O3</th>
			<th scope="col">CaO</th>
			<th scope="col">MgO</th>
			<th scope="col">K2O</th>
			<th scope="col">Cl</th>
			<th scope="col">FSC</th>
			<th scope="col">MS</th>
			<th scope="col">MA</th>
			<th scope="col">Toneladas</th>
			<th scope="col">Viajes</th>
			
			</tr>
		</thead>
		<tbody>
			@foreach($descripciones as $desc)
			<tr>
				<td scope="row">{{$desc->area}}</td>
				<td>{{$desc->Voladura}}</td>
				<td>{{$desc->SiO2}}</td>
				<td>{{$desc->Al2O3}}</td>
				<td>{{$desc->Fe2O3}}</td>
				<td>{{$desc->CaO}}</td>
				<td>{{$desc->MgO}}</td>
				<td>{{$desc->K2O}}</td>
				<td>{{$desc->Cl}}</td>
				<td>{{$desc->FSC}}</td>
				<td>{{$desc->MS}}</td>
				<td>{{$desc->MA}}</td>
				<td>{{$desc->toneladas}}</td>
				<td>{{$desc->viajes}}</td>
			</tr>
			@endforeach()
		</tbody>
	</table>

	<table>
		<thead>
			<tr>
				<th> FSC Total</th>
				<th> MS Total</th>
				<th> MA Total</th>
				<th>Toneladas Total</th>
				<th>Viajes Total</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($blendingsTotal as $bleT)
			<tr>
				<td>{{$bleT->FSC_total}}</td>
				<td>{{$bleT->MS_total}}</td>
				<td>{{$bleT->MA_total}}</td>
				<td>{{$bleT->toneladas_total}}</td>
				<td>{{$bleT->viajes_total}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<p><strong> Observaciones :</strong>{{$item->Observaciones}} </p>

@endsection
  