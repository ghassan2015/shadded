<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data= [
            'id'=>$this->id,
            'rateReview'=>$this->countReviews(),
            'countComplete'=>$this->countComplete(),
            'countReject'=>$this->countReject(),
            'countPending'=>$this->countPending(),
            'countProgress'=>$this->countProgress(),
            'firstName'=>$this->firstName,
            'lastName'=>$this->lastName,
            'mobile'=>$this->mobile,
            'users'=>$this->users?new UserResource($this->users):null,
            'service'=>$this->service?new ServiceResource($this->service):null,
            'country'=>$this->country?new CountryResource($this->country):null,
            'city'=>$this->city?new CityResource($this->country):null,
            'personImage'=>$this->personImage?new AttachmentResource($this->personImage):null,
            'IdPhoto'=>$this->IdPhoto?new AttachmentResource($this->IdPhoto):null,
            'cartPhoto'=>$this->cartPhoto?new AttachmentResource($this->cartPhoto):null,
            'cartForm'=>$this->cartForm?new AttachmentResource($this->cartForm):null,
            'insurancePhoto'=>$this->insurancePhoto?new AttachmentResource($this->insurancePhoto):null,
            'vehicleAuthorization'=>$this->vehicleAuthorization?new AttachmentResource($this->vehicleAuthorization):null,
            'status'=>[
                'id'=>$this->status,
                'name'=>$this->getStatus(),
            ],
            'reason'=>$this->reason,

        ];

        if ($request->requestId){

            $requests=$this->sendRequest()->where('requestId',$request->requestId)->first();
           $data ['requestStatus']=$requests?$requests->pivot->status:null;
            $data['requestPrice']=$requests?$requests->pivot->price:null;

        }
        return  $data;
    }
}
