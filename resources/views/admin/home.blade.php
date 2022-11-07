@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center h1">Database</div>
        <div class="card-body">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Tabel User
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No. HP</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $u)
                                <tr>
                                    <th>{{$u->id}}</th>
                                    <th>{{$u->name}}</th>
                                    <th>{{$u->address}}</th>
                                    <th>{{$u->phone}}</th>
                                    @if($u->is_Admin == 1 )
                                    <th>Admin</th>
                                    @else
                                    <th>User</th>
                                    @endif
                                    <th class="col-md-4">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-auto">
                                                <a href="/home/admin/deleteUsers/{{$u->id}}" class="btn btn-danger">Delete</a>
                                            </div>
                                            <div class="col-sm-auto">
                                                <form action="/home/admin/makeAdmin/{{$u->id}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <!-- <input type="hidden" name="id" value=""> -->
                                                    <input type="hidden" name="isAdmin" value=1>
                                                    <button type="submit" class="btn btn-success">Jadikan admin</button>
                                                </form>
                                            </div>
{{$u->id}}                                            <div class="col-sm-auto">
                                                <form action="/home/admin/makeAdmin/{{$u->id}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <!-- <input type="hidden" name="id" value=""> -->
                                                    <input type="hidden" name="isAdmin" value=0>
                                                    <button type="submit" class="btn btn-danger">Hapus admin</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                <tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="/home/admin/addUsers" class="btn btn-primary">Tambah User</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Tabel Treatments
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-warning">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Durasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($treatments as $treatments)
                                    <tr>
                                        <th>{{$treatments->id}}</th>
                                        <th>{{$treatments->name}}</th>
                                        <th>{{$treatments->price}}</th>
                                        <th>{{$treatments->duration}}</th>
                                        <th><a href="/home/admin/editTreatments/{{$treatments->id}}" class="btn btn-success">Edit</a> | <a href="/home/admin/deleteTreatments/{{$treatments->id}}" class="btn btn-danger">Delete</a></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="/home/admin/addTreatments" class="btn btn-primary">Tambah Treatments</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Tabel Shop
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-warning">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Image</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($shop as $shop)
                                    <tr>
                                        <th>{{$shop->id}}</th>
                                        <th>{{$shop->name}}</th>
                                        <th>{{$shop->stock}}</th>
                                        <th>{{$shop->price}}</th>
                                        <th><img src="/images/{{$shop->image}}" alt="" width="150px" height="150px"></th>
                                        <th>{{$shop->description}}</th>
                                        <th><a href="/home/admin/editShop/{{$shop->id}}" class="btn btn-success">Edit</a> | <a href="/home/admin/deleteShop/{{$shop->id}}" class="btn btn-danger">Delete</a></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="/home/admin/addShop" class="btn btn-primary">Tambah Items</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Tabel Order
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <table class="table table-bordered table-primary table-hover text-center">
                                <thead class="table-primary">
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Berat</th>
                                        <th>Total</th>
                                        <th>Deskripsi</th>
                                        <th>Jenis Treatment</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $o)
                                <tr>
                                    <th>{{$o->id}}</th>
                                    <th>{{$o->berat}}</th>
                                    <th>{{$o->total}}</th>
                                    <th>{{$o->deskripsi}}</th>
                                    <th>{{$o->t_name}}</th>
                                    <th>{{$o->u_name}}</th>
                                    <th>{{$o->status}}</th>
                                    <th><a href="/home/admin/editOrder/{{$o->id}}" class="btn btn-success">Edit</a></th>
                                </tr>
                                @endforeach
                                    <!-- Masukin syntax sql disini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Tabel Order Shop
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <table class="table table-bordered table-primary table-hover text-center">
                                <thead class="table-primary">
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Pemesanan</th>
                                        <th>Total</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ordershop as $os)
                                <tr>
                                    <th>{{$os->id}}</th>
                                    <th>{{$os->name}}</th>
                                    <th>{{$os->address}}</th>
                                    <th>{{$os->name}}</th>
                                    <th>{{$os->total}}</th>
                                    <th>{{$os->created_at}}</th>
                                    <th>{{$os->bukti}}</th>
                                    <th>{{$os->status}}</th>
                                    <th><a href="/home/admin/editOrdershop/{{$os->id}}" class="btn btn-success">Edit</a></th>
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
