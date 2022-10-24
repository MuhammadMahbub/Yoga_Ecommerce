<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerForClass extends Model
{
    use HasFactory;
    protected $guarded  = [];


    public function getClass()
    {
        return $this->belongsTo(YogaClass::class, 'class_id', 'id');
    }


    public function getTrainerInfo()
    {
        return $this->belongsTo(Team::class, 'trainer_id', 'id');
    }


}
