@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($carts as $cart)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $cart->created_at }}</td>
                                <td>
                                    @if($cart->status == 1)
                                    Sudah Pesan & Belum dibayar
                                    @else
                                    Sudah dibayar
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($cart->jumlah_harga) }}</td>
                                <td>
                                    <a href="{{ url('history') }}/{{ $cart->id }}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
