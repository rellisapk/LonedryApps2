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
                                <div class="col-6"><b>Riwayat Pesanan</b></div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover table-responsive-xl">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>ID Order</th> -->
                                        <th>Tanggal Order</th>
                                        <th>Berat</th>
                                        <th>Total Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Jenis Treatment</th>
                                        <th>Status</th>
                                        <th>Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $o)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$o->created_at}}</th>
                                        <th>{{$o->berat}}</th>
                                        <th>{{$o->total}}</th>
                                        <th>{{$o->deskripsi}}</th>
                                        <th>{{$o->t_name}}</th>
                                        <th>{{$o->status}}</th>
                                        <th><a href="/riwayat/nota/{{Auth::user()->id}}/{{$o->id}}" class="btn btn-success">View</a></th>
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