<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
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
        	'bus_id' => ['required', 'exists:buses,id'],
        	'title' => ['required', 'string'],
        	'stations' => ['required', 'array'],
        	'stations.*.city_id' => ['required', 'exists:cities,id'],
            'stations.*.order_column' => ['required', 'integer', 'min:0'],
        ];
    }
}
