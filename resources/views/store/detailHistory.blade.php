@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp. {{ number_format($cart->jumlah_harga) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                    @if(!empty($cart))
                    <p align="right">Tanggal Pesan : {{ $cart->created_at }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($order_details as $order_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="/images/product/{{ $order_detail->shop->image }}" width="20%" alt="...">
                                </td>
                                <td>{{ $order_detail->shop->name }}</td>
                                <td>{{ $order_detail->jumlah }}</td>
                                <td align="right">Rp. {{ number_format($order_detail->shop->price) }}</td>
                                <td align="right">Rp. {{ number_format($order_detail->jumlah_harga) }}</td>

                            </tr>
                            @endforeach
                            

                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($cart->jumlah_harga) }}</strong></td>

                            </tr>
                             <tr>
                                <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($cart->jumlah_harga) }}</strong></td>

                            </tr>
                        </tbody>
                        </table>
                        @foreach($bukti as $b)
                        <div>
                            Bukti pembayaran : <br>
                        <img src="/images/bukti_pembayaran/{{$b->bukti}}" width="50%" height="50%" alt="Bukti">
                        </div>
                        @endforeach
                        <!-- if bukti = empty, munculin form upload -->
                        @if($bukti->isEmpty())
                            <form action="/storeBuktistore" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_detail" value="{{$id}}">
                                <input type="hidden" name="total" value="{{$cart->jumlah_harga}}">
                            <div class="form-group">
                                <label for="image">Bukti Pembayaran</label>
                                <input type="file" name="image" value="" class="form-control" placeholder="foto">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <input type="submit" value="Submit" class="btn btn-secondary ">
                            </div>
                        @else
                        <form action="/updateBuktistore" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="id_detail" value="{{$id}}">
                            <div class="form-group">
                                <label for="image">Edit Bukti Pembayaran</label>
                                <input type="file" name="image" value="" class="form-control" placeholder="foto">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <input type="submit" value="Submit" class="btn btn-secondary ">
                            </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
