@extends('layouts.app')

@section('css')
.not-selected:hover {
    text-decoration: underline;
}
@endsection

@section('content')

<div class="container mx-auto my-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <h3>Profile {{ $user->name }}</h3>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><b>Biodata Diri</b></div>
                        <div class="col-6 not-selected"><a href="/riwayat/{{Auth::user()->id}}"><b>Riwayat Pesanan</b></a></div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('profile.update', $user->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{ $user->name }}" name="name" id="name" type="text" class="form-control" placeholder="Masukkan nama">
                            <p class="text-danger">{{ $errors->first("name") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" class="form-control" id="gender">
                                <option value="0" {{ $user->gender == 0 ? "selected" : "" }}>Laki-Laki</option>
                                <option value="1" {{ $user->gender == 1 ? "selected" : "" }}>Perempuan</option>
                            </select>
                            <p class="text-danger">{{ $errors->first("gender") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="{{ $user->email }}" name="email" id="email" type="email" class="form-control" placeholder="Masukkan email">
                            <p class="text-danger">{{ $errors->first("email") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" type="text" class="form-control" placeholder="Masukkan address">{{ $user->address }}</textarea>
                            <p class="text-danger">{{ $errors->first("address") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="birth">Birth</label>
                            <input value="{{ $user->birth }}" name="birth" id="birth" type="date" class="form-control" placeholder="Masukkan birth">
                            <p class="text-danger">{{ $errors->first("birth") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input value="" name="password" id="password" type="password" class="form-control" placeholder="Masukkan password">
                            <p class="text-danger">{{ $errors->first("password") }}</p>
                        </div>

                        <div class="form-group">
                            <label for="phone">No Telepon</label>
                            <input value="{{ $user->phone }}" name="phone" id="phone" type="number" class="form-control" placeholder="Masukkan nomor telepon">
                            <p class="text-danger">{{ $errors->first("phone") }}</p>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Edit Profile {{ $user->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{ $user->name }}" name="name" id="name" type="text" class="form-control" placeholder="Masukkan nama">
                    <p class="text-danger">{{ $errors->first("name") }}</p>
                </div>

                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" class="form-control" id="gender">
                        <option value="0" {{ $user->gender == 0 ? "selected" : "" }}>Laki-Laki</option>
                        <option value="1" {{ $user->gender == 1 ? "selected" : "" }}>Perempuan</option>
                    </select>
                    <p class="text-danger">{{ $errors->first("gender") }}</p>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="{{ $user->email }}" name="email" id="email" type="email" class="form-control" placeholder="Masukkan email">
                    <p class="text-danger">{{ $errors->first("email") }}</p>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea value="{{ $user->address }}" name="address" id="address" type="text" class="form-control" placeholder="Masukkan address"></textarea>
                    <p class="text-danger">{{ $errors->first("address") }}</p>
                </div>

                <div class="form-group">
                    <label for="birth">Birth</label>
                    <input value="{{ $user->birth }}" name="birth" id="birth" type="date" class="form-control" placeholder="Masukkan birth">
                    <p class="text-danger">{{ $errors->first("birth") }}</p>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input value="{{ $user->password }}" name="password" id="password" type="password" class="form-control" placeholder="Masukkan password">
                    <p class="text-danger">{{ $errors->first("password") }}</p>
                </div>

                <div class="form-group">
                    <label for="phone">No Telepon</label>
                    <input value="{{ $user->phone }}" name="phone" id="phone" type="number" class="form-control" placeholder="Masukkan nomor telepon">
                    <p class="text-danger">{{ $errors->first("phone") }}</p>
                </div>

                <div class="form-group">
                    <label for="image">Foto</label>
                    <input name="image" type="file" class="form-control-file" id="image">
                    <img alt="image" src="{{ asset('assets/images/' . $user->image) }}" class="img-fluid" style="width: 200px; margin-top: 1rem;">
                    <p class="text-danger">{{ $errors->first("image") }}</p>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div> -->
@endsection

