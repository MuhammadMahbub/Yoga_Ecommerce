<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->belongsTo('\App\Models\User', 'user_id', 'id');
    }
}
