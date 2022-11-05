<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        $shops = DB::table('shop')->paginate(10);
        return view('store.home',compact('shops'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addToCart(){
    }
}
