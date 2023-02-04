<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeatRequest extends FormRequest
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
        	'start_city_id' => 'required|exists:cities,id',
            'end_city_id' => 'required|exists:cities,id',
            'expecting_departure_range.from' => [
                'required_with:expecting_departure_range.to',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:today'
            ],
            'expecting_departure_range.to' => [
                'required_with:expecting_departure_range.from',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:expecting_departure_range.from'
            ],
        ];
    }
}
