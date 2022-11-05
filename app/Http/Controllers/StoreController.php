<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        $shops = DB::table('shop')->paginate(10);
        return view('store.home',compact('shops'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addToCart(Request $request){

        $shop_id = $request->input('shop_id');
        $shop_qty = $request->input('shop_qty');

        if(Auth::check()){

            $shop_check = Shop::where('id', $shop_id)->first();

            if($shop_check){
                if(Cart::where('shop_id', $shop_id)->where('user_id', Auth::id())->exists()){

                    return response()->json(['status' => "Already Added"]);
                }
                else{
                $cartItem = new Cart();
                $cartItem->shop_id = $shop_id;
                $cartItem->user_id = Auth::id();
                $cartItem->quantity = $shop_qty;
                $cartItem->save();
                return response()->json(['status' => $shop_check->name. "Added to cart"]);
                }
            }
        }else{
            return response()->json(['status' => "Login to Continue"]);
        }
    }
}
