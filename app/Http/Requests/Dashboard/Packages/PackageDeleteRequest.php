<?php

namespace App\Http\Requests\dashboard\Packages;

use Illuminate\Foundation\Http\FormRequest;

class PackageDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'=>'required|exists:manage_package,id',
            'reservation_id'=>'required|exists:manage_package,reservation_id',

            // 'id' => 'required|exists:reservation_package,id',

        ];

    }
}
