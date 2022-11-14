@extends('layouts.app')

@section('css')
.not-selected {
    color: #8e8e8e;
}
.not-selected:hover {
    text-decoration: underline;
}
@endsection

@section('content')
<div class="container mx-auto my-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa-solid fa-user fa-lg mx-3"></i>Profile {{Auth::user()->name}}</h3>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 not-selected" ><a href="/profile/edit/{{Auth::user()->id}}"><b>Biodata Diri</b></a></div>
                                <div class="col-6 not-selected"><a href="/riwayat/{{Auth::user()->id}}"><b>Riwayat Pesanan</b></a></div>
                                <div class="col-6 not-selected"><a href="/riwayatShop/{{Auth::user()->id}}"><b>Riwayat Belanja</b></a></div>
                                <div class="col-6"><b>Belum Dibayar</b></div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover table-responsive-xl">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>ID Order</th> -->
                                        <th>Tanggal Pemesanan</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $c)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$c->created_at}}</th>
                                        <th>Rp {{number_format($c->jumlah_harga)}}</th>
                                        <th><a href="/history/{{$c->id}}" class="btn btn-success">Bayar</a></th>
                                    </tr>
                                    @endforeach
                                    <!-- Masukin syntax sql disini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection