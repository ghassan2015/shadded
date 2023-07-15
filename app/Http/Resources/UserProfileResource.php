<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'mobile'=>$this->mobile,
            'email'=>$this->email,
            'token'=>$this->plainTextToken??$request->bearerToken(),
            'fcmToken'=>$this->fcmToken,
            'deviceType'=>$this->deviceType,
            'code'=>$this->code,
            'lat'=>$this->lat,
            'long'=>$this->long,
            'photo'=>$this->getPhoto(),
            'provider'=>$this->provider,
            'userType'=>[
                'id'=>$this->userType,
                'name'=>$this->getUserType()

            ],
            'driver'=>$this->driver?new DriverResource($this->driver):null,
            'status'=>[
                'id'=>$this->getActiveStatus(),
                'name'=>$this->getStatus(),

            ]
        ];
    }
}
