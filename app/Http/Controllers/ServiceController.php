<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Shop;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function services()
    {
        // $user = User::findOrFail('id');
        return view('order.services');
    }
    public function riwayat()
    {
        return view('order.riwayat');
    }
    public function store()
    {
        $shop = Shop::all();
        return view('store.home', ['shop'=>$shop]);
    }
    public function pesan()
    {
        return view('store.pesan');
    }
}
