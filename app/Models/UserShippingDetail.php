<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserShippingDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'phone_number', 'city', 'postal_code', 'address'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
