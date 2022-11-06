@extends('layouts.app')

@section('content')
 <div class="accordion-body text-center">
                            <table class="table table-bordered table-primary table-hover text-center">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                @foreach($checkout as $co)
                                <tr>
                                    <th>{{$no++}}</th>
                                    <th>{{$co->name}}</th>
                                    <th>{{$co->jumlah}}</th>
                                    <th>{{$co->price}}</th>
                                    <th>{{$co->jumlah_harga}}</th>
                                    <th><a href="/deleteItem/{{$co->id}}" class="btn btn-success">Delete</a></th>
                                </tr>
                                @endforeach
                                    <!-- Masukin syntax sql disini -->
                                </tbody>
                            </table>
                        </div>
                        @endsection