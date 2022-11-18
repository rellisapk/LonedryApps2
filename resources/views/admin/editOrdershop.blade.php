@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-8 mx-auto">
      <h1>Order Store</h1>
      <form action="/home/admin/updateOrdershop" method="POST">
      @csrf
      {{ method_field('PUT') }}

        @foreach($order_shop as $os)
        <input type="hidden" name="id" value="{{$os->id}}">

        <div class="form-group">
          <label for="status">Status</label>
            <select name="status" class="form-control" id="status">
            <option value="Accepted" {{ $os->status == "Accepted" ? "selected" : "" }}>Accepted</option>
            <option value="On progress" {{ $os->status == "On Progress" ? "selected" : "" }}>On Progress</option>
            <option value="Done" {{ $os->status == "Done" ? "selected" : "" }}>Done</option>
            </select>
        </div>

        <div class="form-group">
            <label for="bukti">Bukti Pembayaran</label><br>
            <img src="/images/bukti_pembayaran/{{$os->bukti}}" alt="" width="150px" height="150px">
        </div>

        <div class="form-group">
          <label for="nama lengkap">Nama</label>
          <input type="text" name="nama lengkap" value="{{ $os->name }}" class="form-control" readonly>
        </div>

        <div class="form-group">
          <label for="address">Alamat</label>
          <textarea name="address" rows="5" class="form-control" readonly>{{$os->address}}</textarea>
        </div>

        <div class="form-group">
          <label for="pemesanan">Pemesanan</label>
          <input name="pemesanan" rows="5" value="{{ $os->name}}" class="form-control">
        </div>

        <div class="form-group">
          <label for="berat">Total (pcs)</label>
          <input name="total" rows="5" value="{{ $os->total}}" class="form-control">
        </div>

        <div class="form-group">
          <label for="tanggal">Tanggal Pemesanan</label>
          <input type="text" name="tanggal" value="{{ $os->created_at }}" class="form-control" readonly>
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


