@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <h3><i class="fa-solid fa-clipboard-list mx-3"></i>Database</h3>

            <div class="accordion" id="accordionExample">

                <!-- TABEL USER -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Tabel User
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-warning">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No. HP</th>
                                        <th>Role</th>
                                        <th class="col-md-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $u)
                                    <tr>
                                        <td>{{$u->id}}</td>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->address}}</td>
                                        <td>{{$u->phone}}</td>
                                        @if($u->is_Admin == 1)
                                        <td>Admin</td>
                                        @else
                                        <td>User</td>
                                        @endif
                                        <td>
                                            <div class="row justify-content-center">
                                                <div class="col-sm-auto">
                                                    <a href="/home/admin/deleteUsers/{{$u->id}}" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <form action="/home/admin/makeAdmin/{{$u->id}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="isAdmin" value=1>
                                                        <button type="submit" class="btn btn-success">Jadikan admin</button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <form action="/home/admin/makeAdmin/{{$u->id}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="isAdmin" value=0>
                                                        <button type="submit" class="btn btn-danger">Hapus admin</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="/home/admin/addUsers" class="btn btn-primary">Tambah User</a>
                        </div>
                    </div>
                </div>

                <!-- TABEL SERVICE PRODUCT -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Tabel Service Product
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
                                        <td>{{$treatments->id}}</td>
                                        <td>{{$treatments->name}}</td>
                                        <td>Rp{{$treatments->price}},00</td>
                                        <td>{{$treatments->duration}}</td>
                                        <td style="width: 100px;">
                                            <a href="/home/admin/editTreatments/{{$treatments->id}}" class="btn btn-success">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="/home/admin/deleteTreatments/{{$treatments->id}}" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="/home/admin/addTreatments" class="btn btn-primary">Tambah Treatments</a>
                        </div>
                    </div>
                </div>

                <!-- TABEL SERVICE ORDER -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Tabel Service Order
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-warning">
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Berat</th>
                                        <th>Total</th>
                                        <th>Deskripsi</th>
                                        <th>Jenis Treatment</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th style="width: 50px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $o)
                                    <tr>
                                        <td>{{$o->id}}</td>
                                        <td>{{$o->berat}}</td>
                                        <td>Rp{{$o->total}},00</td>
                                        <td>{{$o->deskripsi}}</td>
                                        <td>{{$o->t_name}}</td>
                                        <td>{{$o->u_name}}</td>
                                        <td>{{$o->status}}</td>
                                        <td>
                                            <a href="/home/admin/editOrder/{{$o->id}}" class="btn btn-success">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TABEL E-COMMERCE PRODUCT -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Tabel E-Commerce Product
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
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
                                        <th style="width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($shop as $shop)
                                    <tr>
                                        <td>{{$shop->id}}</td>
                                        <td>{{$shop->name}}</td>
                                        <td>{{$shop->stock}}</td>
                                        <td>Rp{{$shop->price}},00</td>
                                        <td><img src="/images/product/{{ $shop->image }}" width="100px"></td>
                                        <td>{{$shop->description}}</td>
                                        <td>
                                            <a href="/home/admin/editShop/{{$shop->id}}" class="btn btn-success">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="/home/admin/deleteShop/{{$shop->id}}" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="/home/admin/addShop" class="btn btn-primary">Tambah Items</a>
                        </div>
                    </div>
                </div>

                <!-- TABEL E-COMMERCE ORDER -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Tabel E-Commerce Order
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-warning">
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Nama</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th style="width: 50px;">Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    @foreach($ordershop as $os)
                                        <tr>
                                            <th>{{$os->id}}</th>
                                            <th>{{$os->name}}</th>
                                            <th>{{$os->name}}</th>
                                            <td>jumlah</td>
                                            <th>Rp {{number_format($os->total)}}</th>
                                            <td>
                                                <a href="/" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- endforeach -->
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
