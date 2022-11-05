<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        $shops = Shop::latest()->paginate(10);
        return view('store.home', compact('shops'));
    }
}
