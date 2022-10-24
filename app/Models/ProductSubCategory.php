<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo('\App\Models\Product', 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('\App\Models\Category', 'category_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsTo('\App\Models\SubCategory', 'sub_category_id', 'id');
    }

    
}
