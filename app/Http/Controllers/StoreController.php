<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Cart;
use App\Models\User;
use Alert;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $shops = DB::table('shop')->paginate(10);
        return view('store.home',compact('shops'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addToCart(Request $request, $id){
        $shop = Shop::where('id', $id)->first();

        if($request->quantity > $shop->stock)
    	{
    		return redirect('store/'.$id);
    	}

        $cek_pesanan = Cart::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_pesanan))
    	{
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->jumlah_harga = 0;
        $cart->status = 0;
        $cart->save();
        }

        $order_new = Cart::where('user_id', Auth::user()->id)
        ->where('status',0)->first();

        $cek_order_new = OrderDetails::where('barang_id', $shop->id)->where('cart_id', $order_new->id)->first();
    	if(empty($cek_order_new))
    	{
        $order_detail = new OrderDetails;
        $order_detail->barang_id = $shop->id;
        $order_detail->user_id = Auth::user()->id;
        $order_detail->cart_id = $order_new->id;
        $order_detail->jumlah = $request->quantity;
        $order_detail->jumlah_harga = $shop->price * $request->quantity;
        $order_detail->save();
        }else{
            $order_detail = OrderDetails::where('barang_id', $shop->id)->where('cart_id', $order_new->id)->first();

    		$order_detail->jumlah = $order_detail->jumlah + $request->quantity;

    		//harga sekarang
    		$harga_order_detail_baru = $shop->price * $request->quantity;
	    	$order_detail->jumlah_harga = $order_detail->jumlah_harga + $harga_order_detail_baru;
	    	$order_detail->update();
        }

        $cart = Cart::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$cart->jumlah_harga = $cart->jumlah_harga + $shop->price*$request->quantity;
    	$cart->update();


        Alert::success('Pesanan Telah Masuk Keranjang','success');
        return redirect('check-out');
    }

    public function checkout()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $order_details = [];
        if(!empty($cart))
        {
            $order_details = OrderDetails::where('cart_id', $cart->id)->get();

        }

        return view('store.checkout', compact('cart', 'order_details'));

        // $checkout = DB::table('order_details')
        //             ->join('cart','cart.id','=','order_details.id')
        //             ->join('shop','shop.id','=','order_details.barang_id')
        //             ->select('order_details.*','cart.id as cart_id','shop.name','shop.price')
        //             ->where('order_details.user_id', $id)
        //             ->get();
        // return view('store.checkout',['checkout'=>$checkout]);

    }

    public function deleteItem($id)
    {
        $order_detail = OrderDetails::where('id', $id)->first();

        $cart = Cart::where('id', $order_detail->cart_id)->first();
        $cart->jumlah_harga = $cart->jumlah_harga-$order_detail->jumlah_harga;
        $cart->update();


        $order_detail->delete();

        Alert::error('Pesanan Sukses Dihapus', 'Hapus');
        return redirect('check-out');
    // $user = Auth::user()->id;
    // DB::table('order_details')
    // ->where('id',$id)->delete();
    // return redirect('/checkout/'.$user);
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        // if(empty($user->alamat))
        // {
        //     Alert::error('Identitasi Harap dilengkapi', 'Error');
        //     return redirect()->route('profile.edit');
        // }

        // if(empty($user->nohp))
        // {
        //     Alert::error('Identitasi Harap dilengkapi', 'Error');
        //     return redirect()->route('profile.edit');
        // }

        $cart= Cart::where('user_id', Auth::user()->id)->where('status',0)->first();
        $cart_id = $cart->id;
        $cart->status = 1;
        $cart->update();

        $order_details = OrderDetails::where('cart_id', $cart_id)->get();
        // dd($shop->stock);
        // foreach ($order_details as $order_detail) {
        //     $shop = Shop::where('id', $order_detail->shop_id)->first();
        //     $shop->stock = $shop->stock - $order_detail->jumlah;
        //     $shop->update();
        // }



        Alert::success('Pesanan Sukses Check Out Silahkan Lanjutkan Proses Pembayaran', 'Success');
        return redirect()->to('history/'.$cart_id);

    }


}
