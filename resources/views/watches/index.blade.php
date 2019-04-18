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
    <div class="container">
        <div class="row">
            @foreach($watches as $w)
                <div class="col-3">
                    <img src="{{ asset($w->image) }}" class="card-img-top" alt="{{ $w->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $w->name }}</h5>
                        <p class="card-text lead">{{ $w->price }}</p>
                        <a href="{{ route('watches.view',['id'=>$w->id]) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop

@section('carousel1')

@endsection
