<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SocilLoginRequest;
use App\Http\Requests\UpdateLatRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\VerifyCodeRequest;
use App\Http\Resources\UserProfileResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(RegisterRequest $request){

        $user=  User::query()->create([
           'mobile'=>$request->mobile,
            'code'=>1111,
            'userType'=>$request->userType,

            'fcmToken'=>$request->fcmToken,
            'deviceType'=>$request->deviceType,


        ]);
        $user->plainTextToken = $user->createToken('user-token')->plainTextToken;

        $response['data']=new UserProfileResource($user);

        return response_api(true ,__('message.success'),$response,201);
    }

    public function verifyCode(VerifyCodeRequest$request){

        $user=User::query()->where('mobile',$request->mobile)->first();

        $user->update([
           'activeStatus'=>1,
        ]);
        $user->plainTextToken = $user->createToken('user-token')->plainTextToken;

        $response['data']=new UserProfileResource($user);

        return response_api(true ,__('message.success'),$response,201);

    }

    public function Login(UserLoginRequest $request)
    {
        try {


            $user = User::where('mobile', $request->mobile)->first();

//            if (!Hash::check($request->password, $user->password)) {
//                $response['data'] = [];
//                return response_api(false, __('validation.passwordNotCorrect'), $response, 422);
//            }
            $user->update([
                'fcmToken'=>$request->fcmToken,
                'deviceType'=>$request->deviceType,
            ]);
            $user->plainTextToken = $user->createToken('user-token')->plainTextToken;

            $response['data'] = new UserProfileResource($user);

            return response_api(true, __('message.success'), $response, 201);
        } catch (\Exception $exception) {
            DB::rollBack();
            $response['data'] = [];
            return response_api(false, __('message.errorServer'), $response, 500);

        }
    }

    public function updateLatLong(UpdateLatRequest $request){

        $user=auth('sanctum')->user();
        $user->update([
            'lat'=>$request->lat,
            'long'=>$request->long,
        ]);

        $response['data']=new UserProfileResource($user);

        return response_api(true ,__('message.success'),$response,201);

    }

    public function  logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        $response['data']=[];

        return response_api(true ,__('message.success'),$response,201);

    }

    public function socialLogin(SocilLoginRequest $request)
    {



        $user = User::query()->where('providerId', $request->providerId)->where('provider', $request->provider)->first();
        $email=User::query()->where('email',$request->email)->whereNull('providerId')->first();

        if ($email){
            $response['data'] = __('Localization.email_found');
            return response_api(false, __('Localization.fail_process'), $response, 422);

        }


        if (!$user) {

            $user = User::create([
                'name' => $request->name,
                'email'=>$request->email,
                'providerId'=>$request->providerId,
                'provider'=>$request->provider,
                'fcmToken'=>$request->fcmToken,
                'deviceType'=>$request->deviceType,
                'userType'=>$request->userType,
                'status'=>1,

            ]);
        }


        $user->plainTextToken = $user->createToken('user-token')->plainTextToken;
        $response['data'] = new UserProfileResource($user);
        return response_api(true, __('Localization.success_process'), $response, 200);


    }
    public function getProfile(){
        $response['data'] = new UserProfileResource(auth('sanctum')->user());
        return response_api(true, 'نجاح العملية', $response, 200);

    }

    public function updateProfile(UpdateProfileRequest $request){

        $user=User::query()->where('id',auth('sanctum')->id())->first();
        auth('sanctum')->user()->update([
            'name' => $request->firstName,
            'lastName'=>$request->lastName,
            'email' => $request->email,
        'mobile'=>$request->mobile,
            'location'=>$request->location,
        ]);


        if ($request->password){
            auth('sanctum')->user()->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $response['data'] = new UserProfileResource(auth('sanctum')->user());
        return response_api(true, 'نجاح العملية', $response, 200);

    }



}
