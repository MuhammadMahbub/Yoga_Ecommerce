<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRole()
    {
        return $this->belongsTo('\App\Models\Role', 'role_id', 'id');
    }
}
