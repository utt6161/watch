@extends('layouts.layout')
@section('title', 'Данные о товаре')
@section('content')

	<div class="mt-4 ml-4">
	<h1>Название: </h1>
	<h1>{{ $watches->name }}</h1>
	<p>id:</p>
	<p>{{ $watches->id }}</p>	
	<p>Цена:</p>
	<p>{{ $watches->price }}</p>
	<p>Изображение:</p>
	<p><img style="width:200px; height:auto;" src="{{ asset($watches->image)}}"></p>
	<hr>
	</div>
@stop