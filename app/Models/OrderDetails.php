<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'barang_id',
        'cart_id',
        'jumlah',
        'jumlah_harga',
        'status',
    ];

    public function shop()
	{
	      return $this->belongsTo('App\Models\Shop','barang_id', 'id');
	}

	public function cart()
	{
	      return $this->belongsTo('App\Models\Cart','cart_id', 'id');
	}
}
