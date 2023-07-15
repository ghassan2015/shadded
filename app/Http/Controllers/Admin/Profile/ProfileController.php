<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use App\Http\Requests\changePasswordRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getProfile(){
        return view('admin.profile.personalInformation');
    }
    public function postProfile(AdminProfileRequest $request){

        $user=\auth()->user()->update([
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'name'=>$request->name,

        ]);
        return response()->json(["status" => 201, 'message' => __('lang.processCompletedSuccess'), 'redirect_url' => route('admin.settings.getProfile')]);

    }
    public function getChange(){

        return view('admin.profile.change');
    }
    public function changePassword(changePasswordRequest $request){
        $user=\auth()->user();

        if (!Hash::check($user->password,$request->oldPassword)){
            return redirect()->back();

        }

        $user->update([
            'password'=>Hash::make($request->newPassword),
        ]);

        return redirect()->back();

    }

}
