@extends('layouts.app')

@section('css')

@endsection

@section('content')

<div class="container my-3">
    <div class="container card border-dark">  
        <form class="d-flex m-5" role="search">
            <input class="form-control me-2" type="search" placeholder="What are you looking for..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="mx-5 mb-5">
            <div class="card-group">
            @foreach($shops as $shop)
                <div class="card">
                    <img src="{{ Storage::url('public/images/product').$shop->image }}" class="card-img-top align-items-center" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $shop->name }}</h5>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group col-4" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-dark">-</button>
                            <input class="form-control col-sm-5" type="text">
                            <button type="button" class="btn btn-dark">+</button>
                        </div>
                        <button class="btn btn-secondary float-end" type="submit">Add to Cart</button>   
                    </div>
                </div>
                @endforeach
                <!-- <div class="card">
                    <img src="..." class="card-img-top align-items-center" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Barang 2</h5>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group col-4" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-dark">-</button>
                            <input class="form-control col-sm-5" type="text">
                            <button type="button" class="btn btn-dark">+</button>
                        </div>
                        <button class="btn btn-secondary float-end" type="submit">Add to Cart</button>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top align-items-center" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Barang 3</h5>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group col-4" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-dark">-</button>
                            <input class="form-control col-sm-5" type="text">
                            <button type="button" class="btn btn-dark">+</button>
                        </div>
                        <button class="btn btn-secondary float-end" type="submit">Add to Cart</button>
                    </div>
                </div>
            </div> -->
            <div class="btn-toolbar justify-content-center mt-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="text-center mt-2">
                <button class="btn btn-dark"><a href="">Check My Shopping Cart</a></button>
            </div>
        </div>
    </div>
</div>

@endsection