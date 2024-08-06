<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'slug',
        'image',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function product_subcategory()
    {
        return $this->hasMany(ProductSubcategory::class);
    }
}
