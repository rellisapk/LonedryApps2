@extends('layouts.app')

@section('content')
<div class="container my-3 text-center">
    <div class="card">
        <div class="card-body">
            <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
            @if(!empty($cart))
            <p align="right">Tanggal Pesan : {{ $cart->created_at }}</p>
            <table class="table table-striped">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($order_details as $order_detail)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <img src="{{ url('uploads') }}/{{ $order_detail->shop->image }}" width="100" alt="...">
                        </td>
                        <td>{{ $order_detail->shop->name }}</td>
                        <td>{{ $order_detail->jumlah }}</td>
                        <td align="right">Rp. {{ number_format($order_detail->shop->price) }}</td>
                        <td align="right">Rp. {{ number_format($order_detail->jumlah_harga) }}</td>
                        <td>
                            <form action="{{ url('check-out') }}/{{ $order_detail->id }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                        <td align="right"><strong>Rp. {{ number_format($cart->jumlah_harga) }}</strong></td>
                        <td>
                            <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                                <i class="fa fa-shopping-cart"></i> Check Out
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>  
    </div>
</div>
@endsection