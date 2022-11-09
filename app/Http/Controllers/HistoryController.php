<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Cart;
use App\Models\User;
use App\Models\OrderDetails;
use App\Models\Ordershop;
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
        $bukti = Ordershop::where('id_detail',$id)->get();

     	return view('store.detailHistory', compact('cart','order_details','bukti','id'));
    }

    public function storeBuktistore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasfile('image')) {            
            $filename = round(microtime(true) * 1).'-'.str_replace(' ','-',$request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('images'), $filename);
        }

        Ordershop::create([
            
            'user_id'=>Auth::user()->id,
            'bukti' => $filename,
            "id_detail"=> $request->id_detail,
            'total' => $request->total,
        ]);

        return redirect()->back();
    }

    public function updateBuktistore(Request $request)
    {

                   
        if ($request->hasfile('image')) {            
            $filename = round(microtime(true) * 1).'-'.str_replace(' ','-',$request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('images'), $filename);
        }

        if($request->hasfile('image')){
            Ordershop::where('id_detail',$request->id_detail)->update([
                'bukti' => $filename,
            ]);
        }else{
            Ordershop::where('id_detail',$request->id_detail)->update([
                'user_id'=>Auth::user()->id,
                "id_detail"=> $request->id_detail,
            ]);
        }
        return redirect()->back();
             
    }
}
