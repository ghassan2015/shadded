<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterDriverRequest;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function store(RegisterDriverRequest $request){

        Driver::query()->create([
            'userId'=>auth()->id(),
            'serviceId'=>$request->serviceId,
            'driverType'=>$request->driverType,
            'countryId'=>$request->countryId,
            'cityId'=>$request->cityId,
            'firstName'=>$request->firstName,
            'latName'=>$request->latName,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'bankNumber'=>$request->bankNumber,
            'personImageId'=>$request->personImageId,
            'IdPhotoId'=>$request->IdPhotoId,
            'cartPhotoId'=>$request->cartPhotoId,
            'carFormId'=>$request->carFormId,
            'insurancePhotoId'=>$request->insurancePhotoId,
            'vehicleAuthorizationId'=>$request->vehicleAuthorizationId,

        ]);

        $response['data']=[];
        return response_api(true,__('message.success'),$response,201);
    }
}
