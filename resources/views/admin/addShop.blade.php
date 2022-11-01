@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-8 mx-auto">
      <h1>Tambah Item</h1>
      <form action="/home/admin/storeShop" method="POST">
      @csrf

        <div class="form-group">
          <label for="name">Nama Barang</label>
          <input type="text" name="name" value="" class="form-control">
        </div>

        <div class="form-group">
          <label for="stock">Stok</label>
          <input type="text" name="stock" value="" class="form-control">
        </div>

        <div class="form-group">
          <label for="price">Harga</label>
          <input type="text" name="price" value="" class="form-control">
        </div>

        <div class="form-group">
          <label for="description">Deskripsi Produk</label>
          <input type="text" name="description" value="" class="form-control">
        </div>

        <div class="row">
          <div class="col-12">
            <input type="submit" value="Submit" class="btn btn-secondary ">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
