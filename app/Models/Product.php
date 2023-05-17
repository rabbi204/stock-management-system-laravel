<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

     // relation with category table
     public function getCategory()
     {
         return $this->belongsTo(Category::class, 'category_id', 'id');
     }

    // relation with subcategory table
     public function getSubCategory()
     {
         return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
     }

    // relation with supplier table
    public function getSupplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    // relation with brand table
    public function getBrand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
