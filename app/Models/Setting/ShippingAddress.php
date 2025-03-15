<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'city_id', 'province_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
