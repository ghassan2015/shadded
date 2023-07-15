<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttachmentRequest;
use App\Http\Resources\AttachmentResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\ServiceResource;
use App\Models\City;
use App\Models\Country;
use App\Models\Service;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    use PaginationTrait;
    public function Country(Request $request){
        $countries=Country::query()->where('status',1)->paginate();
        $filters = $request;
        $filter_option = "&" . http_build_query($filters);
        $response['data'] = CountryResource::collection($countries);
        $pagination_options = $this->get_options_v2($countries, $filter_option);
        $response = $response + $pagination_options;
        return response_api(true, __('message.success'), $response, 200);


    }

    public function city(Request $request){
        $countries=City::query()->where('countryId',$request->countryId)->paginate();
        $filters = $request;
        $filter_option = "&" . http_build_query($filters);
        $response['data'] = CityResource::collection($countries);
        $pagination_options = $this->get_options_v2($countries, $filter_option);
        $response = $response + $pagination_options;
        return response_api(true, __('message.success'), $response, 200);

    }
    public function services(Request $request){
        $countries=Service::query()->where('status',1)->paginate();
        $filters = $request;
        $filter_option = "&" . http_build_query($filters);
        $response['data'] = ServiceResource::collection($countries);
        $pagination_options = $this->get_options_v2($countries, $filter_option);
        $response = $response + $pagination_options;
        return response_api(true, __('message.success'), $response, 200);

    }

    public function attachments(AttachmentRequest $request){
        $attachments=Upload($request->file('attachment'));
        $response['data'] = new AttachmentResource($attachments);
        return response_api(true, __('message.success'), $response, 200);

    }

}
