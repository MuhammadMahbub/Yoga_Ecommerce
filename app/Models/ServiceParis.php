<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ServiceParis extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $translatable = ['title','short_description','description','lable','subtitle','expart_word','training_duration','other_language','group_size','health_hygiene','hosting','place_to_stay',''];

    protected $table = 'service_paris'; 
    protected $guarded = [];

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
        return $this->hasMany(ImageForService::class, 'service_id')->orderBy('order','ASC');
    }

    public function getTrainers()
    {
        return $this->hasMany(TrainerForService::class, 'service_id');
    }

    public function pricing(){
        return $this->hasMany(ClassPricing::class, 'class_id', 'id');
    }
}
