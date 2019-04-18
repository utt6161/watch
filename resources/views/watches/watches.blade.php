@extends('layouts.layout')

@section('title', 'Часики')

@section('content')
@if(Session::has('message'))
	<div class="alert alert-danger text-center" role="alert">
	  {{ Session::get('message') }}
	</div>
@endif
<div style = "padding-top: 60px ;padding-left:60px; padding-right:60px">
<table class="table text-center">
	<thead class="thead-dark">
		<th>Название</th>
		<th>Цена</th>
		<th>Количество</th>
		<th>Изображение</th>
		<th></th>
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
					<td >{{ $w->price }}</td>
					<td><input name="quantity" type = "number" min=1 max=10></td>
					<td><img style="width:200px; height:auto;"src="{{ asset($w->image) }}"></td>
					<td><button type="submit">В корзину</button></td>		
				</tr>
			</form>
			@endforeach
	</tbody>
</table>
</div>
@stop