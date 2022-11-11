@extends('layouts.app')

@section('css')
.profile-about img {
    width: 200px;
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
        ['Salsabila Karin', '140810190015','Back End Developer', 'IMPRESSIONS'],
        ['Saddam Habibi Utomo', '140810190017','Product Manager, Front End Developer', 'IMPRESSIONS'],
        ['Zahra Claura Hermawan', '140810190027','UI/UX Designer', 'IMPRESSIONS'],
        ['Rellisa Puspa Kusuma', '140810190029','Back End Developer', 'IMPRESSIONS'],
        ['Anastasia Victoria Yuarsa', '140810190049','Front End Developer', 'IMPRESSIONS']
    ]

    function fungsi(a) {
        var data = ""

        for (var n = 0; n < a.length; n++) {
            data += `
            <div class="profile-about col-lg-3 col-md-5 text-center m-3">
                <img src="https://api.himatif.org/data/assets/foto/2019/${a[n][1]}.jpg">
                <br>
                <b>${a[n][0]}</b>
                <br>
                ${a[n][1]}
                <br>
                ${a[n][2]}
            </div>
            `
        }
        return data
    }

    var profile = fungsi(profiles)
    document.getElementById("profile").innerHTML = profile
</script>
@endsection