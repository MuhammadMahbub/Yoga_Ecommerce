<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = ['id'];
    protected $translatable = ['name'];

    public function creator()
    {
        return $this->belongsTo('\App\Models\User', 'created_by', 'id');
    }

    public function modifier()
    {
        return $this->belongsTo('\App\Models\User', 'updated_by', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany('\App\Models\SubCategory', 'category_id', 'id');
    }

    public function shop_categories()
    {
        return $this->hasMany('\App\Models\Shop', 'category_id', 'id');
    }
}
