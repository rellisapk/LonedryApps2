@extends('layouts.app')

@section('css')
.card img {
  height: 200px;
  object-fit: cover;
  object-position: center;
}
@endsection

@section('content')
<div class="container my-5">
    <div class="card">
        <form class="d-flex mt-5 mx-5" role="search" action="/store/search" method="GET">
            <input name="search" class="form-control me-2" type="search" placeholder="What are you looking for..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="row p-5">
            @foreach($shops as $shop)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 py-3">
                <div class="card">
                    <img src="images/product/{{ $shop->image }}" width="100%">
                    <div class="card-body">
                        <h3 class="card-title">{{$shop->name}}</h3>
                        <h5 class="card-text">Harga: {{$shop->price}}</h5>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @if ($shop->stock > 0)
                            <form action="/addToCart/{{$shop->id}}" method="post" class="input-group">
                                @csrf
                                <nav aria-label="nav store">
                                    <ul class="pagination">
                                        <li class="page-item"><button type="button" class="btn btn-primary decrement-btn">-</button></li>
                                        <li class="page-item" style="width: 50px"><input type="text" class="form-control input-qty text-center" name="quantity" value="1"></li>
                                        <li class="page-item"><button type="button" class="btn btn-primary increment-btn">+</button></li>
                                        <li class="page-item"><button class="btn btn-outline-secondary addToCartBtn" type="submit">Add to Cart</button></li>
                                    </ul>
                                </nav>
                            </form>
                            @else
                            <label for="out">Out of stock</label>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-dark"><a href="check-out">Check My Shopping Cart</a></button>
    </div>
</div>


@endsection

@section('scripts')
<script>
    $(document).ready(function (e){

        // $('.addToCartBtn').click(function (e){
        //     e.preventDefault();

        //     var shop_id = $(this).closest('.shop_data').find('.shop_id').val();
        //     var shop_qty = $(this).closest('.shop_data').find('.input-qty').val();

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //         method: "POST",
        //         url: "/add-to-cart",
        //         data: {
        //             'shop_id': shop_id,
        //             'quantity': shop_qty,
        //         },
        //         alert(data);
        //         success: function (response){
        //             alert(response.status);
        //         }
        //     });
        // });

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
