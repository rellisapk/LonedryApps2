<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Shop;
use App\Models\Treatments;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function services()
    {
        $treatments = Treatments::all();
        return view('order.services', compact('treatments'));
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