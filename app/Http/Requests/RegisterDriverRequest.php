<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDriverRequest extends BaseApiRequest
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
            'serviceId'=>'required|exists:services,id',
            'driverType'=>'required|in:1,2',
            'countryId'=>'required|exists:countries,id',
            'cityId'=>'required|exists:cities,id',
            'firstName'=>'required',
            'latName'=>'required',
            'mobile'=>'required|unique:drivers,mobile',
            'email'=>'required|unique:drivers,email',
            'bankNumber'=>'required',
            'personImageId'=>'required|exists:attachments,id',
            'IdPhotoId'=>'required|exists:attachments,id',
            'cartPhotoId'=>'required|exists:attachments,id',
            'carFormId'=>'required|exists:attachments,id',
            'insurancePhotoId'=>'required|exists:attachments,id',
            'vehicleAuthorizationId'=>'exists:attachments,id',

        ];
    }
}
