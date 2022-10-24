<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class YogaClass extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = ['id'];
    protected $translatable = ['title','short_description','description','lable','subtitle','expart_word','training_duration','other_language','group_size','health_hygiene','hosting','place_to_stay',''];

    public function creator()
    {
        return $this->belongsTo('\App\Models\User', 'created_by', 'id');
    }

    public function modifier()
    {
        return $this->belongsTo('\App\Models\User', 'updated_by', 'id');
    }

    public function getImages()
    {
        return $this->hasMany(ImageForClass::class, 'class_id')->orderBy('order','ASC');
    }

    public function getTrainers()
    {
        return $this->hasMany(TrainerForClass::class, 'class_id');
    }

    public function pricing(){
        return $this->hasMany(ClassPricing::class, 'class_id', 'id');
    }

}
