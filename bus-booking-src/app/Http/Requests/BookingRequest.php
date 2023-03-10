<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
        	'user_id' => ['required', 'exists:users,id'],
        	'seat_id' => ['required', 'exists:seats,id'],
        	'start_city_id' => ['required', 'exists:cities,id'],
        	'end_city_id' => ['required', 'exists:cities,id'],
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

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->user_id ?? auth()->user()->id,
        ]);
    }
}
