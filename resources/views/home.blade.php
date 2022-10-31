@extends('layouts.app')

@section('css')
.head-wrap {
	overflow: hidden;
	position: relative;
	height: 300px;
}

.head-bg {
	position: absolute;
	left: 0;
	top: -13;
	width: 100%;
	height: auto;
}

.head-content {
	position: relative;
}

.service-wrap {
	overflow: hidden;
	position: relative;
	height: 300px;
	width: 300px;
	margin: 20px;
}

.service-img {
	position: absolute;
}

.text-span{
	color: #EB5757;
}
@endsection

@section('content')
<div class="container-fluid head-wrap">
	<img class="head-bg" src="{{ asset('images/bg_home.png') }}">
	<div class="container mt-5 head-content">
		<div class="row justify-content-center align-items-center">
			<div class="col-4">
				<img src="{{ asset('images/lonedry_black.png') }}" alt="Lonedry">
			</div>
			<div class="col-6">
				<h1 class="fw-bold">Lonedry merupakan aplikasi berbasis website yang menawarkan jasa Laundry dengan layanan <span class="text-span rounded">Gratis</span> pesan antar.</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row mt-5">
		<div class="col">
    		<p class="text-center fw-bold fs-1">WHAT WE OFFER</p>
    	</div>
	</div>
	<div class="row justify-content-around mt-5">
		<div class="col-2">
			<img src="{{ asset('images/service.png') }}" style="height: 65%; width: auto;" alt="Layanan">
		</div>
		<div class="col-8 justify-content-center">
			<h1>Laundry Service</h1>
			<br>
			<p class="h2">Kami menawarkan jasa laundry dengan banyak pilihan paket menarik dan juga layanan pesan antar.</p>
			<br>
			<button class="btn float-end rounded" style="background-color: #C08497;">
				<a href="{{ url('/services') }}" class="h3 fw-semibold fst-italic text-white">{{ __('Order here') }}</a>
			</button>
		</div>
	</div>
	<div class="row justify-content-around">
		<div class="col-8 justify-content-center text-end">
			<h1>Laundry Product</h1>
			<br>
			<p class="h2">Kami menawarkan produk laundry dengan kualitas terbaik agar pengalaman mencucimu menyenangkan.</p>
			<br>
			<button class="btn float-start rounded" style="background-color: #C08497;">
				<a href="{{ url('/store') }}" class="h3 fw-semibold fst-italic text-white">{{ __('Order here') }}</a>
			</button>
		</div>
		<div class="col-2">
			<img src="{{ asset('images/store.png') }}" style="height: 65%; width: auto;" alt="Layanan">
		</div>
	</div>
</div>
@endsection