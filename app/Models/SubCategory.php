<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relation with category table
    public function getCategoriesName()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


}
