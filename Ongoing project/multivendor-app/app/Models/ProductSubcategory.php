<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_category_id',
        'name',
        'desc',
        'slug',
        'image',
    ];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
