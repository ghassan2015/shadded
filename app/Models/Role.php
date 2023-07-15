<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    protected $guarded=[];

    public function scopeActive($q){
        return $q->where('status',1);
    }

    protected $casts = [
        'permissions' => 'array',
    ];
    public function getPermissionsAttribute($permissions)
    {
        return json_decode($permissions, true);
    }
}
