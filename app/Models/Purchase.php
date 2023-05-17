<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = [];

    // relation with supplier table
    public function getSupplierName()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    // relation with brand table
    public function getBrandName()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }


}
