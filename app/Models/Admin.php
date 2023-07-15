<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded=[];

    public function attachment(){
        return $this->belongsTo(Attachment::class,'photo','id');
    }
    public function getAttachment(){

        if (is_null($this->photo)){
            return asset('images/users.png');
        }

        return $this->attachment->fileURl();

    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function hasAbility($permissions)
    {
        $role = $this->role;

        if (!$role) {
            return false;
        }

        foreach ($role->permissions as $permission) {
            if (is_array($permissions) && in_array($permission, $permissions)) {
                return true;
            } else if (is_string($permissions) && strcmp($permissions, $permission) == 0) {
                return true;
            }
        }
        return false;
    }

}
