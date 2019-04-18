@extends('layouts.layout')
@section('title','Главная')
@section('script')
@stop
@section("header_panel")
<main role="main">
<section class="jumbotron text-center">
	<div class="container-center">
		<h1 class="jumbotron-heading" style="color:white">"Часовщик"</h1>
		<p class="lead" style="color:white">
			Прямиком из Швейцарии
		</p>
	</div>
</section>
</main>
@stop

@section('content')
<div class = "text-center" style = "padding-left:60px; padding-right:60px">
	<h3 style = "color:white; padding-bottom:15px">Предложение ограничено!</h4>
	<table style="width:100%" class="table">
		<thead>
			<th>Название</th>
			<th>Цена</th>
			<th>Изображение</th>
			<th> </th>
		</thead>
		<tbody>
			@foreach($watches as $w)
			<form method="POST" action = "{{ route('cart.add') }}">
				@csrf 
				<input name="id" type="hidden" value="{{ $w->watchid }}">
				<input name="name" type="hidden" value="{{ $w->name }}">
				<input name="price" type="hidden" value="{{ $w->price }}">
				<input name="image" type="hidden" value="{{ $w->image }}">
				<tr>
					<td>
						<a href="{{ route('watches.view',['id'=>$w->id]) }}">
							{{ $w->name }}
						</a>
					</td>
					<td>{{ $w->price }}</td>
					<td><img style="width:200px; height:auto;" src="{{ asset($w->image) }}"></td>
					<td><button type="submit">В корзину</button></td>
				</tr>
			</form>
				@endforeach
			</tbody>
  	</table>
</div>
@stop

@section('carousel1')

@endsection
