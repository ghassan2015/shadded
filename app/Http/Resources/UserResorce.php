<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResorce extends JsonResource
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
            'mobile'=>$this->mobile,
            'name'=>$this->name,
            'code'=>$this->code,
            'lat'=>$this->lat,
            'long'=>$this->long,
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
