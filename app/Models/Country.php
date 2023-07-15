<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;
    protected $guarded=[];
    use SoftDeletes;

    public function city(){
        return $this->hasMany(City::class,'countryId','id');
    }

    public function attachment(){
        return $this->belongsTo(Attachment::class,'photoId','id');
    }
}
