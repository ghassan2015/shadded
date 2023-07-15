<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends BaseApiRequest
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
            'firstName'=>'required',
            'lastName'=>'required',
            'mobile'=>'required|unique:users,mobile,'.auth('sanctum')->id(),
            'email'=>'required|unique:users,email,'.auth('sanctum')->id(),
//            'countryId'=>'required|exists:countries,id',
//            'cityId'=>'required|exists:cities,id',
            'location'=>'required',

        ];
    }
}
