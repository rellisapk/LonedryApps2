@extends('layouts.app')
@section('css')

@endsection
@section('content')

<div class="container my-3">
	<div class="container card text-center">
		<h1 class="fw-bold my-5">Our Packages</h1>
		<div class="d-grid mb-5 gap-3">
			<div class="container col-8 border-1 my-1" style="--bs-bg-opacity: .5;">
				@foreach($treatments as $treatments)
				@if ($treatments->id % 2 != 0)
				<div class="card text-start mb-3">
					<h3 class="card-header bg-primary bg-gradient text-light">{{$treatments->name}}</h3>
					<div class="card-body">
						<p class="card-text h3"><i class="fa-solid fa-money-bill"></i> Harga : {{$treatments->price}}</p>
						<p class="card-text h3"><i class="fa-sharp fa-solid fa-clock"></i> Durasi : {{$treatments->duration}}</p>
					</div>
				</div>
				@else
				<div class="card text-end mb-3">
					<h3 class="card-header bg-success bg-gradient text-light">{{$treatments->name}}</h3>
					<div class="card-body">
						<p class="card-text h3">{{$treatments->price}} : Harga <i class="fa-solid fa-money-bill"></i></p>
						<p class="card-text h3">{{$treatments->duration}} : Durasi <i class="fa-sharp fa-solid fa-clock"></i></p>
					</div>
				</div>
				@endif
				@endforeach
                <a href="/order/{user}" class="btn btn-primary">Go somewhere</a>
			</div>
		</div>
	</div>
</div>
@endsection
