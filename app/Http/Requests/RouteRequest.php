<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteRequest extends FormRequest
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
            'name' => 'required|min:2|max:10',
            'weight' => 'required|min:2|max:10',
            'from' => 'required|min:2|max:10',
            'to' => 'required|min:2|max:10',
            'date' => 'required|min:2|max:5'
        ];
    }
}
