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
            @foreach($shops as $shop)
            <div class="card-group shop_data">
                <div class="card">
                <img src="/images/product/{{ $shop->image }}" width="20%">
                    <div class="card-body">
                        <h5 class="card-title">{{$shop->name}}</h5>
                        <h5 class="card-title">Harga: {{$shop->price}}</h5>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group col-4" role="group" aria-label="Basic example">
                            @if ($shop->stock > 0)
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input class="form-control col-sm-5 input-qty" type="text" value="1">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                            @else
                            <label for="out">Out of stock</label>
                            @endif
                        </div>
                        <input type="hidden" value="{{ $shop->id }}" class="shop_id">
                        <button class="btn btn-secondary float-end addToCartBtn" type="submit">Add to Cart</button>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="text-center mt-2">
                <button class="btn btn-dark"><a href="">Check My Shopping Cart</a></button>
            </div>
            {{$shops->links() }}
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function (e){
        $('.addToCartBtn').click(function (e){
            e.preventDefault();

            var shop_id = $(this).closest('.shop_data').find('.shop_id').val();
            var shop_qty = $(this).closest('.shop_data').find('.input-qty').val();

            alert(shop_id);
            alert(shop_qty);
        });

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
