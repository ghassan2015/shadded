<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestReview extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class,'driverId','id');

    }

    public function requests()
    {
        return $this->belongsTo(Request::class,'requestId','id');
    }

    protected $casts=[
        'rate'=>'double',
    ];
}
