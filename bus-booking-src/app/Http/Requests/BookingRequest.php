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
        // check if update request or store request
        $id =  $this->booking->id ?? NULL;

        return [
        	'user_id' => ['required', 'exists:users,id'],
        	'seat_id' => ['required', 'exists:seats,id'],
        	'start_city_id' => ['required', 'exists:cities,id'],
        	'end_city_id' => ['required', 'exists:cities,id'],
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
