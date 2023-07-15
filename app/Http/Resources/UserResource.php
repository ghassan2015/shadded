<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'rate'=>0,
            'mobile'=>$this->mobile,
            'firstName'=>$this->name,
            'lastName'=>$this->lastName,
            'code'=>$this->code,
            'lat'=>$this->lat,
            'long'=>$this->long,
            'location'=>$this->location,
            'photo'=>$this->getPhoto(),
            'userType'=>[
                'id'=>$this->userType,
                'name'=>$this->getUserType()

            ],
            'status'=>[
                'id'=>$this->getActiveStatus(),
                'name'=>$this->getStatus(),

            ]

        ];

    }
}
