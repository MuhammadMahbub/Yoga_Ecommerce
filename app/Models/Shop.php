<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = ['id'];
    protected $translatable = ['name','description'];

    public function get_category()
    {
        return $this->belongsTo('\App\Models\Category', 'category_id', 'id');
    }

    public function get_shop_thumb()
    {
        return $this->hasMany('\App\Models\ShopThumb', 'shop_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo('\App\Models\User', 'created_by', 'id');
    }

    public function modifier()
    {
        return $this->belongsTo('\App\Models\User', 'updated_by', 'id');
    }
}
