<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request extends BaseApiRequest
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
            'description'=>'required',
            'startLatitude'=>'required',
            'startLongitude'=>'required',
            'endLatitude'=>'required',
            'endLongitude'=>'required',
//            'distance'=>$thi
            'date'=>'required:date_format:Y-m-d',
            'commission'=>'required|in:0,1',
            'numberWorker'=>'numeric|min:0',
            'technicianRefrigeration'=>'numeric|min:0',
            'reassembleAssemble'=>'numeric|min:0',
            'photoId'=>'array|required|exists:attachments,id'
        ];
    }
}
