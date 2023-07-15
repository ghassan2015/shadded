<?php

namespace App\Http\Controllers\Api\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\AcceptDriverRequest;
use App\Http\Requests\confirmationRequest;
use App\Http\Requests\SendRequestRequest;
use App\Http\Requests\UpdateRequestsRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Resources\CountryResource;
use App\Http\Resources\DriverResource;
use App\Http\Resources\RequestResource;
use App\Http\Resources\SendRequestResource;
use App\Models\Driver;
use App\Models\RequestImage;
use App\Traits\PaginationTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceResponse;

class RequestController extends Controller
{
    use PaginationTrait;

    public function index(Request $request)
    {
        $sizes = $request->size ?? 12;
        $filters = $request;
        $status = $request->status;
        $requests = \App\Models\Request::query()
            ->orderBy('id', 'desc')
            ->when(auth('sanctum')->user()->driver ?? false, function ($q) {

                $q->where('driverId', auth('sanctum')->user()->driver->id)->orwhere('userId', auth('sanctum')->id());
            })->when(auth('sanctum')->user()->driver ?? false, function ($q) {
                $q->where('userId', auth('sanctum')->id());
            })->when($status ?? false, function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->paginate($sizes);
        $filters = $request;

        $filter_option = "&" . http_build_query($filters);
        $response['data'] = $requests ? RequestResource::collection($requests) : [];
        $pagination_options = $this->get_options_v2($requests, $filter_option);
        $response = $response + $pagination_options;
        return response_api(true, __('message.success'), $response, 200);

    }


    public function getAllRequest(Request $request)
    {
        $sizes = $request->size ?? 12;
        $filters = $request;
        $status = $request->status;
        $requests = \App\Models\Request::query()
            ->orderBy('id', 'desc')
            ->when(auth('sanctum')->user()->driver ?? false, function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->paginate($sizes);
        $filter_option = "&" . http_build_query($filters);
        $response['data'] = $requests ? RequestResource::collection($requests) : [];
        $pagination_options = $this->get_options_v2($requests, $filter_option);
        $response = $response + $pagination_options;
        return response_api(true, __('message.success'), $response, 200);

    }

    public function createRequest(\App\Http\Requests\Request $request)
    {

        $requests = \App\Models\Request::create([
            'userId' => auth('sanctum')->id(),
            'serviceId' => $request->serviceId,
            'description' => $request->description,
//            'photo'=>$
//            'LoadingZone'=>$request->LoadingZone,
            'startLatitude' => $request->startLatitude,
            'startLongitude' => $request->startLongitude,
            'endLatitude' => $request->endLatitude,
            'endLongitude' => $request->endLongitude,
//          'downloadZone'=>$request->downloadZone,
            'commission' => $request->commission,
            'date' => $request->date,
            'numberWorker' => $request->numberWorker,
            'technicianRefrigeration' => $request->technicianRefrigeration,
            'reassembleAssemble' => $request->reassembleAssemble,
            'status' => 1,



        ]);

        if (isset($request->photoId)) {
            foreach ($request->photoId as $value) {
                RequestImage::query()->create([
                    'requestId' => $requests->id,
                    'photoId' => $value,
                ]);
            }
        }
//        return $requests;
        $response['data'] = new RequestResource($requests);
        return response_api(true, __('message.success'), $response, 201);

    }

    public function sendRequest(SendRequestRequest $request)
    {
        $requests = \App\Models\Request::query()->where('id', $request->requestId)->first();
        $driverId = auth()->user()->driver ? auth()->user()->driver->id : null;
        $requests->sendRequest()->attach($driverId, ['price' => 30]);
        $response['data'] = $requests ? new RequestResource($requests) : [];
        return response_api(true, __('message.success'), $response, 201);
    }


    public function confirmation(confirmationRequest $request)
    {
        $requests = \App\Models\Request::query()->where('id', $request->requestId)->first();

        $requests->update([
            'acceptAt' => Carbon::now()
        ]);

        $response['data'] = $requests ? new RequestResource($requests) : [];
        return response_api(true, __('message.success'), $response, 201);

    }

    public function arriveRequest(confirmationRequest $request)
    {
        $requests = \App\Models\Request::query()->where('id', $request->requestId)->first();

        $requests->update([
            'arriveAt' => Carbon::now()
        ]);

        $response['data'] = $requests ? new RequestResource($requests) : [];
        return response_api(true, __('message.success'), $response, 201);

    }

    public function updateRequest(UpdateRequestsRequest $request)
    {
        $driverId = $request->driverId;
        $requests = \App\Models\Request::query()->where('id', $request->requestId)->first();
        if ($request->status != 2) {
            $requests->sendRequest()->updateExistingPivot($request->dirverId, ['status' => $request->status]);

        } else {
            $drivers = Driver::query()->whereHas('sendRequest', function ($q) use ($requests) {
                $q->where('requestId', $requests->id);
            })->get();

            foreach ($drivers as $value) {
                $requests->sendRequest()->updateExistingPivot($value->id, ['status' => 3]);
            }

            $acceptRequest = $requests->sendRequest()->where('driverId', $request->driverId)->first();


            $requests->sendRequest()->updateExistingPivot($request->dirverId, ['status' => 2]);
            $acceptDriver = $requests->sendRequest()->wherePivot('driverId', $request->driverId)->first();
            $requests->update([
                'price' => $acceptDriver->pivot->price,
                'driverId' => $driverId,
                'acceptAt' => Carbon::now(),
            ]);
        }


        $response['data'] = $requests ? new RequestResource($requests) : null;
        return response_api(true, __('message.success'), $response, 201);


    }

    public function updateStatus(UpdateStatusRequest $request)
    {
        $requests = \App\Models\Request::query()->where('id', $request->requestId)->first();
        $requests->update([
            'status' => $request->status
        ]);

        if ($request->status == 2) {
            $requests->update([
                'completedAt' => Carbon::now()
            ]);
        }

        if ($request->status == 3) {

            $requests->update([
                'cancelAt' => Carbon::now()
            ]);
        }
        $response['data'] = $requests ? new RequestResource($requests) : null;
        return response_api(true, __('message.success'), $response, 201);

    }


    public function myRequestUser(Request $request)
    {
        $sizes = $request->size ?? 12;
        $filters = $request;
        $status = $request->status;
        $requests = \App\Models\Request::query()
            ->orderBy('id', 'desc')
            ->where('userId', auth('sanctum')->id())
            ->when($status, function ($q) use ($status) {
                $q->where('status', $status);

            })
            ->paginate($sizes);
        $filter_option = "&" . http_build_query($filters);
        $response['data'] = $requests ? RequestResource::collection($requests) : [];
        $pagination_options = $this->get_options_v2($requests, $filter_option);
        $response = $response + $pagination_options;
        return response_api(true, __('message.success'), $response, 200);


    }

    public function myRequestDriver(Request $request)
    {
        $sizes = $request->size ?? 12;
        $filters = $request;
        $status = $request->status;
        $requests = \App\Models\Request::query()
            ->orderBy('id', 'desc')
            ->when(auth('sanctum')->user()->driver ?? false, function ($q) {
                $q->where('driverId', auth('sanctum')->user()->driver->id);
            })
            ->when($status ?? false, function ($q) use ($status) {

                $q->whereIn('status', [2, 3]);

            })
            ->paginate($sizes);
        $filter_option = "&" . http_build_query($filters);
        $response['data'] = $requests ? RequestResource::collection($requests) : [];
        $pagination_options = $this->get_options_v2($requests, $filter_option);
        $response = $response + $pagination_options;
        return response_api(true, __('message.success'), $response, 200);


    }

    public function cancelRequest(confirmationRequest $request)
    {
        $requests = \App\Models\Request::query()->where('id', $request->requestId)->first();
        $requests->update([
            'cancelAt' => Carbon::now(),
        ]);


        $response['data'] = $requests ? new RequestResource($requests) : null;
        return response_api(true, __('message.success'), $response, 201);

    }


}
