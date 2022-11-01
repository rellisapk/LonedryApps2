@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-8 mx-auto">
      <h1>Edit Item</h1>
      <form action="/home/admin/updateShop" method="POST">
      @csrf
      {{ method_field('PUT') }}

        @foreach($shop as $s)
        <input type="hidden" name="id" value="{{$s->id}}">

        <div class="form-group">
          <label for="name">Nama Barang</label>
          <input type="text" name="name" value="{{ $s->name }}" class="form-control">
        </div>

        <div class="form-group">
          <label for="stock">Stok</label>
          <input type="text" name="stock" value="{{ $s->stock }}" class="form-control">
        </div>

        <div class="form-group">
          <label for="price">Harga</label>
          <input type="text" name="price" value="{{ $s->price }}" class="form-control">
        </div>

        <div class="form-group">
          <label for="description">Deskripsi</label>
          <input type="text" name="description" value="{{ $s->description }}" class="form-control">
        </div>

        <div class="row">
          <div class="col-12">
            <input type="submit" value="Submit" class="btn btn-secondary ">
          </div>
        </div>
      </form>
      @endforeach
    </div>
  </div>
</div>
@endsection
