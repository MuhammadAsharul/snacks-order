<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'short_description', 'long_description', 'price', 'category_name', 'category_id', 'image', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class, 'product_id', 'id');
    }
}
