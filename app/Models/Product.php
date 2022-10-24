<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id']; 

    public function creator()
    {
        return $this->belongsTo('\App\Models\User', 'created_by', 'id');
    }

    public function modifier()
    {
        return $this->belongsTo('\App\Models\User', 'updated_by', 'id');
    }

    public function gallery()
    {
        return $this->hasMany('\App\Models\ProductMultipleImage', 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('\App\Models\Category', 'category_id', 'id');
    }

    public function sub_category()
    { 
        return $this->hasMany('\App\Models\ProductSubCategory', 'product_id', 'id');
    }

    
}
