<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRequest;
use App\Http\Resources\ChatResoruce;
use App\Http\Resources\ServiceResource;
use App\Models\Chat;
use App\Models\Service;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    use PaginationTrait;
    public function index(Request $request){
        $sizes = $request->size ?? 12;

        $chats=Chat::query()
            ->when(auth('sanctum')->user()->driver??false,function ($q){
                $q->where('driverId',auth('sanctum')->user()->driver->id);
            }) ->when(!auth('sanctum')->user()->driver??false,function ($q) {
                $q->where('userId', auth('sanctum')->id());
            })->paginate($sizes);

        $filters = $request;
        $filter_option = "&" . http_build_query($filters);
        $response['data'] =  ChatResoruce::collection($chats);
        $pagination_options = $this->get_options_v2($chats, $filter_option);
        $response = $response + $pagination_options;
        return response_api(true, __('message.success'), $response, 200);

    }

    public function store(ChatRequest $request){
        $chats=Chat::query()->updateOrCreate(
            [
           'userId'=>$request->userId,
           'driverId'=>$request->driverId,
           ],[
                'chatKey'=>$request->chatKey,
        ]);

        $response['data'] =  new ChatResoruce($chats);

        return response_api(true, __('message.success'), $response, 200);

    }
}
