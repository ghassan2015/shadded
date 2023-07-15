<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function attachment(){
        return $this->belongsTo(Attachment::class,'photoId','id');
    }

    public function services(){
        return $this->belongsTo(Service::class,'serviceId','Id');
    }
}
