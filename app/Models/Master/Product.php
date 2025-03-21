<?php

namespace App\Models\Master;

use App\Models\Feature\Order;
use App\Models\Feature\OrderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['name', 'categories_id', 'slug', 'thumbnails', 'price', 'stock', 'weight', 'description'];

    protected $appends = ['thumbnails_path', 'price_format', 'total_sold'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function orderDetails()  // ✅ Fix: Define orderDetails relationship
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    public function getThumbnailsPathAttribute()
    {
        return asset('storage/' . $this->thumbnails);
    }

    public function getPriceFormatAttribute()
    {
        return "₱ " . number_format($this->price, 0, '.', ',');
    }

    public function getTotalSoldAttribute()
    {
        return $this->orderDetails()->whereHas('order', function ($q) {
            $q->whereIn('status', [2, 3]);
        })->sum('qty');
    }
}
