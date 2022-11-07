<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'jumlah_harga',
    ];

    public function user()
	{
	      return $this->belongsTo('App\Models\User','user_id', 'id');
	}

	public function order_detail()
	{
	     return $this->hasMany('App\Models\OrderDetails','cart_id', 'id');
	}
}
