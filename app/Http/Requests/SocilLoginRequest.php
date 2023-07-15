<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocilLoginRequest extends BaseApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'providerId'=>'required',
            'provider'=>'required',
            'email'=>'required|unique:users,email',
            'fcmToken'=>'required',
            'deviceType'=>'required',
            'userType'=>'required',
        ];
    }
}
