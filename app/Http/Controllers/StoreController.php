<?php

namespace App\Http\Controllers;
use App\Models\Shop;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        $shops = Shop::all();
        return view('store.home');
    }
}
