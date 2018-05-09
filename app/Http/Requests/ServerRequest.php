<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'serverName'        => 'required|max:150',
            'serverHost'        => 'required|max:150',
            'serverLocation'    => 'required|max:150',
            'serverLimit'       => 'required|numeric|max:150',
            'serverDescription' => 'max:500',
        ];
    }
}
