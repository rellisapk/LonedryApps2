<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatments;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $treatments = Treatments::all();
        $users = User::where('id', Auth::user()->id)->first();
        return view('order.order', compact('users', 'treatments'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'treatment' => 'required',
        ]);

        $order = new Orders;
        $order->user_id = $request->user()->id;
        $order->berat = $request->berat;
        $order->deskripsi = $request->deskripsi;
        $order->status = $request->status;
        $order->save();

        $treatment = Treatments::all();
        foreach($request->treatment as $treatment){
            $order->treatment_id = $treatment;
            $servis = Treatments::where('id', $treatment)->first();
            $totalHarga = $servis->price * $request->berat;
            $order->total = $totalHarga;
            $order->save();
        }

        return back()->with('success', 'Pesanan Baru Dibuat');
    }

    public function riwayat($id)
    {
        $orders = DB::table('orders')
                    ->join('users','users.id','=','orders.user_id')
                    ->join('treatments','treatments.id','=','orders.treatment_id')
                    ->select('orders.*', 'users.name as u_name','users.id','treatments.name as t_name')
                    ->where('orders.user_id', $id)
                    ->get();
        return view('order.riwayat',['orders'=>$orders]);

    }



    public function nota($id, $order_id)
    {
        $user = User::findOrFail($id);
        $orders = DB::table('orders')
                    ->join('users','users.id','=','orders.user_id')
                    ->join('treatments','treatments.id','=','orders.treatment_id')
                    ->select('orders.*', 'users.name as u_name','treatments.name as t_name')
                    ->where('orders.id', $order_id)
                    ->get();
        $treatments = Treatments::all();
        return view('order.nota', ['user' => $user,'orders'=>$orders,'treatments'=>$treatments]);
    }

    public function cetak_pdf($id, $order_id)
    {
        $user = User::findOrFail($id);
        $orders = DB::table('orders')
                    ->join('users','users.id','=','orders.user_id')
                    ->join('treatments','treatments.id','=','orders.treatment_id')
                    ->select('orders.*', 'users.name as u_name','treatments.name as t_name')
                    ->where('orders.id', $order_id)
                    ->get();
        $treatments = Treatments::all();
        $pdf = PDF::loadview('order.nota',['user' => $user,'orders'=>$orders,'treatments'=>$treatments]);
        return $pdf->stream();
    }

}
