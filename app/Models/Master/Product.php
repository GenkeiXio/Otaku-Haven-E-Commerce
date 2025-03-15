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
    protected $appends = ['thumbnails_path','price_₱','total_sold'];
    protected $fillable = ['name', 'category_id', 'thumbnails_path', 'price', 'stock', 'total_sold'];

    public function Category()
    {
        return $this->belongsTo(Category::class,'categories_id');
    }
    
    public function updateStock($quantity, $action = 'subtract')
    {
        if ($action === 'subtract') {
            $this->decrement('stock', $quantity);
        } elseif ($action === 'add') {
            $this->increment('stock', $quantity);
        }
    }

    public function OrderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getThumbnailsPathAttribute()
    {
        return asset('storage/' . $this->thumbnails);
    }

    public function getPricerupiahAttribute()
    {
        return "₱ " . number_format($this->price,0,',','.');
    }

    public function getTotalSoldAttribute()
    {
        return $this->OrderDetails()->whereHas('Order',function($q){
            $q->whereIn('status',[2,3]);
        })->sum('qty');
    }
}
