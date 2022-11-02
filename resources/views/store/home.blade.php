@extends('layouts.app')
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection