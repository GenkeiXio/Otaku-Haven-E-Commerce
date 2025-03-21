<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'thumbnails'];

    protected $appends = ['thumbnails_path'];

    public function products()
    {
        return $this->hasMany(Product::class, 'categories_id', 'id');
    }

    public function getThumbnailsPathAttribute()
    {
        return asset('storage/' . $this->thumbnails);
    }
}
