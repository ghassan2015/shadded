<?php

namespace App\Http\Controllers\Api\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReivewRequest;
use App\Http\Resources\ChatResoruce;
use App\Http\Resources\ReviewRequestResource;
use App\Models\RequestReview;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    use PaginationTrait;
    public function index(Request $request){

        $sizes = $request->size ?? 12;
        $reviews=RequestReview::query()
            ->when(auth('sanctum')->user()->driver ?? false, function ($q) {

                $q->where('driverId', auth('sanctum')->user()->driver->id)->orwhere('userId', auth('sanctum')->id());
            })->when(auth('sanctum')->user()->driver ?? false, function ($q) {
                $q->where('userId', auth('sanctum')->id());

            })            ->paginate($sizes);
        $filters = $request;

        $filter_option = "&" . http_build_query($filters);
        $response['data'] = $reviews ? ReviewRequestResource::collection($reviews) : [];
        $pagination_options = $this->get_options_v2($reviews, $filter_option);
        $response = $response + $pagination_options;
        return response_api(true, __('message.success'), $response, 200);

    }
    public function store(ReivewRequest $request){
        $review=RequestReview::query()->create([
            'userId'=>auth('sanctum')->id(),
            'driverId'=>$request->driverId,
            'message'=>$request->message,
            'rate'=>$request->rate,
            'requestId'=>$request->requestId,
        ]);

        $response['data'] =  new ReviewRequestResource($review);

        return response_api(true, __('message.success'), $response, 200);

    }
}
