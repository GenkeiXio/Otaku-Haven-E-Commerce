<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'full_name', 'phone_number', 'region', 'province',
        'city', 'barangay', 'postal_code', 'street_name', 'building',
        'house_number', 'is_default'
    ];
}
