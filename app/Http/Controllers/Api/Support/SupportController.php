<?php

namespace App\Http\Controllers\Api\Support;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportRequest;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function store(SupportRequest $request){

        Support::query()->create([
            'message'=>$request->message,
            'userId'=>auth('sanctum')->id(),
        ]);

        $response['data']=[];
        return response_api(true, __('message.success'), $response, 201);

    }
}
