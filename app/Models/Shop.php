<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'shop';

    protected $fillable = [
        'name',
        'stock',
        'price',
        'image',
        'description'
    ];

    public function order_detail()
	{
	     return $this->hasMany('App\Models\OrderDetails','barang_id', 'id');
	}
}
