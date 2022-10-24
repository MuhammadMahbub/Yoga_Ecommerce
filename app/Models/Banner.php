<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Banner extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = ['id'];
    protected $translatable = ['banner_title1','banner_title2','button_text'];

    public function creator()
    {
        return $this->belongsTo('\App\Models\User', 'created_by', 'id');
    }

    public function modifier()
    {
        return $this->belongsTo('\App\Models\User', 'updated_by', 'id');
    }

}
