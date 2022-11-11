@extends('layouts.app')

@section('css')
.profile-about img {
    width: 100px;
}
@endsection

@section('content')
<div class="container my-5">
    <div class="card p-5">
        <div class="row mx-auto"><h2>Let’s Get to Know Our Team!</h2></div>
        <div class="row justify-content-around" id="profile"></div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var profiles = [
        ['https://cdn-icons-png.flaticon.com/512/168/168724.png', 'FULL NAME 1', 'ROLE', 'IMPRESSIONS'],
        ['https://cdn-icons-png.flaticon.com/512/168/168724.png', 'FULL NAME 2', 'ROLE', 'IMPRESSIONS'],
        ['https://cdn-icons-png.flaticon.com/512/168/168724.png', 'FULL NAME 3', 'ROLE', 'IMPRESSIONS'],
        ['https://cdn-icons-png.flaticon.com/512/168/168724.png', 'FULL NAME 4', 'ROLE', 'IMPRESSIONS'],
        ['https://cdn-icons-png.flaticon.com/512/168/168724.png', 'FULL NAME 5', 'ROLE', 'IMPRESSIONS']
    ]

    function fungsi(a) {
        var data = ""

        for (var n = 0; n < a.length; n++) {
            data += `
            <div class="profile-about col-lg-3 col-md-5 text-center m-3">
                <img src="${a[n][0]}">
                <br>
                <b>${a[n][1]}</b>
                <br>
                ${a[n][2]}
                <br>
                <i>${a[n][3]}</i>
            </div>
            `
        }
        return data
    }

    var profile = fungsi(profiles)
    document.getElementById("profile").innerHTML = profile
</script>
@endsection