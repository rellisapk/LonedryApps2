<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordershop extends Model
{
    use HasFactory;
    protected $table = 'order_shop';

    protected $fillable = [
        'user_id',
        'pemesanan',
        'total',
        'bukti',
        'id_detail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
