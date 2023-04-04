<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'shipping_phonenumber', 'shipping_city', 'shipping_postalcode', 'shipping_address', 'product_id', 'quantity', 'total_harga', 'invoice', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function orderdetails()
    {
        return $this->hasMany(Order::class, 'order_id', 'id');
    }
}
