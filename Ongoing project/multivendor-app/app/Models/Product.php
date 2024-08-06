<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'product_subcategory_id',
        'brand_id',
        'vendor_id',
        'name',
        'price',
        'discount',
        'slug',
        'qty',
        'color',
        'size',
        'long_desc',
        'short_desc',
        'specification',
        'product_thumbnail',
        'product_code',
        'weight',
        'featured',
        'new_product',
        'tags',
        'best_offer',
        'best_seller',
        'special_offer',
        'top_product',
        'video_url',
        'status',
    ];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function product_subcategory()
    {
        return $this->belongsTo(ProductSubcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function order_item()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function product_multiImage()
    {
        return $this->hasMany(ProductMultiImage::class);
    }
}
