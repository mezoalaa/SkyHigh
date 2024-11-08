<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
// require './vendor/autoload.php';
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class SettingUpdateRequest extends FormRequest
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
            'name'=>'string|nullable',
            'description'=>'string|nullable',
            'email'=>'email|nullable',
            'phone'=>'string|nullable',
            'address'=>'string|nullable',
            'logo'=>'nullable|image|mimes:png,jpg,jpeg.svg,gif|max:2048',
            'favicon'=>'nullable|image|mimes:png,jpg,jpeg.svg,gif|max:2048',
            'Facebook'=>'string|nullable',
            'Instagram'=>'string|nullable',
            'Google'=>'string|nullable',
            'Website'=>'string|nullable',

        ];
    }
}
