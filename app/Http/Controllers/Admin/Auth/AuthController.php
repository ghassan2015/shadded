<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\changePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Country;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(LoginRequest $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        }

        $admin_cred = $request->only('email', 'password');
        if (auth()->guard('admin')->attempt($admin_cred)) {

            if (auth('admin')->user()->status){
                return response()->json(["status"=>201,"redirect_location"=>route("admin.index")]);

            }else{

                return response()->json(["status"=>422,"redirect_location"=>route("login")]);

            }

        }else{


            return response()->json(["status"=>404,"redirect_location"=>route("login")]);


        }

    }


    public function logout(){
        Auth::logout();

        return redirect()->route('index');
    }

    public function getProfile(){

        return view('profile.profile');
    }

    public function postProfile(ProfileRequest $request){

        $user=\auth('admin')->user()->update([
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'name'=>$request->name,

        ]);
        return response()->json(["status" => 201, 'message' => __('lang.processCompletedSuccess'), 'redirect_url' => route('admin.settings.getProfile')]);

    }

    public function changePassword(changePasswordRequest $request){

        $user=\auth('admin')->user();

        if (!Hash::check($user->password,$request->oldPassword)){
            return response()->json(["status" => 422, 'message' => 'كلمة المرور الحالية غير صحيحة']);

        }

        $user->update([
            'password'=>Hash::make($request->newPassword),
        ]);

        return response()->json(["status" => 201, 'message' => __('lang.processCompletedSuccess'), 'redirect_url' => route('admin.settings.getProfile')]);

    }



}

