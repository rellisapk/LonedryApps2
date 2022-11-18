@extends('layouts.app')

@section('css')
.card img {
  height: 200px;
  object-fit: cover;
  object-position: center;
}
@endsection

@section('content')
<div class="container my-3">
    <div class="card">
        <form class="d-flex mt-5 mx-5" role="search" action="/store/search" method="GET">
            <input name="search" class="form-control me-2" type="search" placeholder="What are you looking for..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="row mx-3 my-3">
            @foreach($shops as $shop)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 py-3">
                <div class="card">
                    <img src="images/product/{{ $shop->image }}" width="150px" class="align-self-center my-2">
                    <div class="card-body">
                        <h3 class="card-title">{{$shop->name}}</h3>
                        <h5 class="card-text">Harga : Rp{{$shop->price}}</h5>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @if ($shop->stock > 0)
                            <form action="/addToCart/{{$shop->id}}" method="post" class="input-group">
                                @csrf
                                <nav aria-label="nav store">
                                    <ul class="pagination">
                                        <li class="page-item"><button type="button" class="btn btn-primary decrement-btn">-</button></li>
                                        <li class="page-item" style="width: 40px"><input type="text" class="form-control input-qty text-center" name="quantity" value="1"></li>
                                        <li class="page-item"><button type="button" class="btn btn-primary increment-btn">+</button></li>   
                                        <li class="page-item"><button class="btn btn-outline-secondary addToCartBtn" type="submit">Tambah</button></li>
                                    </ul>
                                </nav>
                            </form>
                            @else
                            <label for="out">Out of stock</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last Update {{$shop->updated_at}}</small>
                </div>
            </div>
            @endforeach
            <div class="text-center">
                <button class="btn btn-lg btn-dark"><a href="check-out">Keranjang Saya</a></button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    $(document).ready(function (e){

        $('.increment-btn').click(function (e){
            e.preventDefault();
            var inc_value = $('.input-qty').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10){
                value++;
                $('.input-qty').val(value);
            }
        });

        $('.decrement-btn').click(function (e){
            e.preventDefault();
            var dec_value = $('.input-qty').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1){
                value--;
                $('.input-qty').val(value);
            }
        });
    });
</script>
@endsection
