<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // protected $dateFormat = 'U';
    use HasFactory;
    protected $fillable = ['user_id', 'shipping_phonenumber', 'shipping_city', 'shipping_postalcode', 'shipping_address', 'shipping_tglpemesanan', 'status_pemesanan', 'shipping_note', 'total_harga', 'invoice', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function detail()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }
}
