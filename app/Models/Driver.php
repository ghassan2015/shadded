<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory;
    protected $guarded=[];


    use SoftDeletes;
    public function service(){
        return $this->belongsTo(Service::class,'serviceId','id');

    }

    public function sendRequest(){
        return $this->belongsToMany(Request::class,'driver_request','driverId','requestId','id','id')->withPivot('price','status');
    }

    public function users(){
        return $this->belongsTo(User::class,'userId','id');

    }
    public function getPhoto(){
        return asset('assets/images/users.png');
    }
    public function country(){
        return $this->belongsTo(Country::class,'countryId','id');

    }

    public function city(){
        return $this->belongsTo(City::class,'cityId','id');

    }
    public function personImage(){
        return $this->belongsTo(Attachment::class,'personImageId','id');

    }

//    public

    public function IdPhoto(){
        return $this->belongsTo(Attachment::class,'IdPhotoId','id');

    }


    public function insurancePhoto(){
        return $this->belongsTo(Attachment::class,'insurancePhotoId','id');

    }


    public function cartPhoto(){
        return $this->belongsTo(Attachment::class,'cartPhotoId','id');

    }


    public function cartForm(){
        return $this->belongsTo(Attachment::class,'carFormId','id');

    }

    public function vehicleAuthorization(){
        return $this->belongsTo(Attachment::class,'vehicleAuthorizationId','id');

    }

    public function requests(){
        return $this->hasMany(Request::class,'driverId','id');
    }

    public function countComplete(){
        return $this->requests()->whereNotNull('completedAt')->count();
    }

    public function countProgress(){
        return $this->sendRequest()->whereNotNull('arriveAt')->whereNull('completedAt')->count();
    }

    public function countReject(){
        return $this->sendRequest()->wherePivot('status',3)->count();
    }
    public function countPending(){
        return $this->sendRequest()->wherePivot('status',1)->count();
    }
    public function getStatus(){
        if ($this->status==1){
            return 'مقبول';
        }elseif ( $this->status==2){
            return 'مرفوض';

        }else{
            return 'قيد الانتظار';

        }
    }


    public function reviews(){
        return $this->hasMany(RequestReview::class,'driverId','id');
    }
    public function countReviews(){
        $rate=$this->reviews()->where('driverId',$this->id)->avg('rate');
        return doubleval($rate);
    }



}
