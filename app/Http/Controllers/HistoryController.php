<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Cart;
use App\Models\User;
use App\Models\OrderDetails;
use Auth;
use Alert;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$carts = Cart::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

    	return view('store.history', compact('carts'));
    }

    public function detail($id)
    {
    	$cart = Cart::where('id', $id)->first();
    	$order_details = OrderDetails::where('cart_id', $cart->id)->get();

     	return view('store.detailHistory', compact('cart','order_details'));
    }
}
