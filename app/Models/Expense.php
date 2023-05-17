<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relation with category table
    public function getExpenseCategoriesName()
    {
        return $this->belongsTo(ExpenseCategory::class, 'exp_cat_id', 'id');
    }
}
