<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestImage extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function attachment(){
        return $this->belongsTo(Attachment::class,'photoId','id');
    }
}
