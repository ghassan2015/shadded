<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Mail\Attachment;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getUserType(){
        if ($this->userType==1){
        return 'User';
        }else{
            return 'Driver';
        }
    }

    public function getStatus(){
        if ($this->activeStatus==1){
            return 'active';
        }else{
            return 'notActive';
        }
    }


    public function requests(){
        return $this->hasMany(Request::class,'userId','id');
    }

    public function attachment(){
        return $this->belongsTo(Attachment::class,'attachmentId','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }
    public function getPhoto(){
    return asset('assets/images/users.png');
    }

    public function getActiveStatus(){
        if ($this->activeStatus==1){
            return 1;
        }else{
            return 0;
        }
    }

    public function driver(){
        return $this->hasOne(Driver::class,'userId','id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
