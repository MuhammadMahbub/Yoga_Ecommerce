<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PriceItem extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded = ['id'];
    protected $translatable = ['room_info', 'house_info'];

    public function getImages(){
        return $this->hasMany(PriceItemImage::class, 'price_item_id', 'id');
    }
}
