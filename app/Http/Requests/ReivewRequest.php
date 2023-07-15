<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReivewRequest extends BaseApiRequest
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
//            'userId'=>'required|exists:users,id',
            'driverId'=>'required|exists:drivers,id',
            'requestId'=>'required|exists:requests,id',
            'rate'=>'required',
        ];
    }
}
