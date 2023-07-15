<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResoruce extends JsonResource
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
            'chatKey'=>$this->chatKey,
            'user'=>$this->user?new UserResource($this->user):null,
            'driver'=>$this->driver?new DriverResource($this->driver):null,
        ];
    }
}
