<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Cart;
use App\Models\OrderDetails;
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

    public function addToCart(Request $request, $id){
        $shop = Shop::where('id', $id)->first();
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->jumlah_harga = $shop->price * $request->quantity;
        $cart->status = 0;
        $cart->save();

        $order_new = Cart::where('user_id', Auth::user()->id)
        ->where('status',0)->first();

        $order_detail = new OrderDetails;
        $order_detail->barang_id = $shop->id;
        $order_detail->user_id = Auth::user()->id;
        $order_detail->cart_id = $order_new->id;
        $order_detail->jumlah = $request->quantity;
        $order_detail->jumlah_harga = $shop->price * $request->quantity;
        $order_detail->save();

        return redirect()->to('/store')
                        ->with('success','Added to Cart.');
    }

    public function checkout($id)
    {
        $checkout = DB::table('order_details')
                    ->join('cart','cart.id','=','order_details.id')
                    ->join('shop','shop.id','=','order_details.barang_id')
                    ->select('order_details.*','cart.id as cart_id','shop.name','shop.price')
                    ->where('order_details.user_id', $id)
                    ->get();
        return view('store.checkout',['checkout'=>$checkout]);

    }

    public function deleteItem($id)
    {
    $user = Auth::user()->id;
    DB::table('order_details')
    ->where('id',$id)->delete();
    return redirect('/checkout/'.$user);
    }

    
}
