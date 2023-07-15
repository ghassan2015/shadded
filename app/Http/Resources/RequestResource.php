<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return   [
            'id'=>$this->id,
            'isRate'=>$this->reviews?true:false,
            'rate'=>$this->reviews?$this->reviews->rate:0,
            'requestImage'=>$this->requestImage?RequestImageResource::collection($this->requestImage):[],
            'user'=>$this->user?new  UserResource($this->user):null,
            'driver'=>$this->driver?new DriverResource($this->driver):null,
            'description'=>$this->description,
            'startLatitude'=>$this->startLatitude,
            'startLongitude'=>$this->startLongitude,
            'endLatitude'=>$this->endLatitude,
            'endLongitude'=>$this->endLongitude,
            'date'=>$this->date,
            'commission'=>$this->commission,
            'numberWorker'=>$this->numberWorker,
            'technicianRefrigeration'=>$this->technicianRefrigeration,
            'reassembleAssemble'=>$this->reassembleAssemble,
            'completedAt'=>$this->completedAt?Carbon::parse($this->completedAt)->format('Y-m-d h:i'):null,
            'cancelAt'=>$this->cancelAt?Carbon::parse($this->cancelAt)->format('Y-m-d h:i'):null,
            'acceptAt'=>$this->acceptAt?Carbon::parse($this->acceptAt)->format('Y-m-d h:i'):null,
            'arriveAt'=>$this->arriveAt?Carbon::parse($this->arriveAt)->format('Y-m-d h:i'):null,
            'reason'=>$this->reason,
            'distance'=>$this->getDistanceInKilometers().'KM',
            'accessTime'=>$this->accessTime,
            'startAt'=>$this->startAt,
            'endAt'=>$this->endAt,
            'status'=>[
             'id'=>$this->status,
                'name'=>$this->getStatusName()
        ],
            'driversRequest'=>$this->sendRequest?DriverResource::collection($this->sendRequest):[]
        ];


    }
}
