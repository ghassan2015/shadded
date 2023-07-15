<?php

namespace App\Models;

use App\Http\Resources\ChatResoruce;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class,'driverId','id');

    }
}
