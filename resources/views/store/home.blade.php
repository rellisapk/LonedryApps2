@extends('layouts.app')
<<<<<<< HEAD
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center h1">Database</div>
        <div class="card-body">
            <div class="accordion" id="accordionExample">           

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Store
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-warning">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($shop as $o)
                                    <tr>
                                        <th>{{$o->name}}</th>
                                        <th>{{$o->stock}}</th>
                                        <th>{{$o->price}}</th>
                                        <th>{{$o->description}}</th>
                                        <th><div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="text" name="jumlah" value="" class="form-control">
                                        </div></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="/store/pesan" class="btn btn-primary">Pesan</a>
=======

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
                            <form action="/addToCart/{{$shop->id}}" method="post">
                                @csrf
                                <button class="input-group-text decrement-btn">-</button>
                                <input class="form-control col-sm-5 input-qty" type="text" name="quantity" value="1">
                                <button class="input-group-text increment-btn">+</button>
                                <button class="btn btn-secondary float-end addToCartBtn" type="submit">Add to Cart</button>
                            </form>
                            @else
                            <label for="out">Out of stock</label>
                            @endif
>>>>>>> 70b2960688e08110a3183f8e34a5ccd8960ae8be
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
        </div>
    </div>
</div>
@endsection
=======
            @endforeach
            <div class="text-center mt-2">
                <button class="btn btn-dark"><a href="check-out">Check My Shopping Cart</a></button>
            </div>
        </div>
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
>>>>>>> 70b2960688e08110a3183f8e34a5ccd8960ae8be
