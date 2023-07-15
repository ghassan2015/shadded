<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table='requests';
    protected $fillable =['id','userId','userId','serviceId','price','description','date','commission','numberWorker','technicianRefrigeration','reassembleAssemble','completedAt','completedAt','acceptAt','arriveAt','reason','distance','accessTime','startAt','endAt','startLatitude','endLatitude','startLongitude','endLongitude','status','cancelAt'];
    public function service(){
        return $this->belongsTo(Service::class,'serviceId','id');
    }
    function getDistanceInKilometers()
    {
        $earthRadius = 6371; // Earth's radius in kilometers

        $lat1Rad = deg2rad($this->startLatitude);
        $lon1Rad = deg2rad($this->endLatitude);
        $lat2Rad = deg2rad($this->startLongitude);
        $lon2Rad = deg2rad($this->endLongitude);

        $deltaLat = $lat2Rad - $lat1Rad;
        $deltaLon = $lon2Rad - $lon1Rad;

        $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos($lat1Rad) * cos($lat2Rad) * sin($deltaLon / 2) * sin($deltaLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;

        return $distance;
    }


    public function driver(){
        return $this->belongsTo(Driver::class,'driverId','id');
    }
    public function requestImage(){
        return $this->hasMany(RequestImage::class,'requestId','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }
    public function sendRequest(){
        return $this->belongsToMany(Driver::class,'driver_request','requestId','driverId','id','id')->withPivot('price','status');
    }

    public function getStatusName(){

        if ($this->status==1){
            return 'قيد الانتظار';
        }
        elseif ($this->status==2){
            return 'مكتمل';

        }
        else{
            return 'ملغي';
        }

    }

    public function getStatus(){

        if ($this->status==1){
            return  '<span class="badge-secondary">'.'قيد الانتظار'.'</sapn>';
        }
        elseif ($this->status==2){
            return  '<span class="badge-success">'.'مكتمل'.'</sapn>';

        }
        else{
            return  '<span class="badge-danger">'.'ملغي'.'</sapn>';
        }

    }

    public function reviews(){
        return $this->hasOne(RequestReview::class,'requestId','id');
    }
}
