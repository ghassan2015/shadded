<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    use PaginationTrait;
    public function index(Request $request){
        $size = $request->size ?? 12;
$serviceId=$request->serviceId;
$name=$request->name;
$drivers=Driver::query()->orderBy('id','desc')
    ->when($serviceId??false,function ($q)use ($serviceId){
        $q->where('serviceId',$serviceId);
    })
    ->when($name??false,function ($q)use ($name){
        $q->where('name','like','%'.$name.'%');
    })
        ->paginate($size);
        $filters = $request;
        $filter_option = "&" . http_build_query($filters);
        $response['data'] = DriverResource::collection($drivers);
        $pagination_options = $this->get_options_v2($drivers, $filter_option);
        $response = $response + $pagination_options;
        return response_api(true, __('message.success'), $response, 200);

    }
}
