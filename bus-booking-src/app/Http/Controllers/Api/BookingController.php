<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $bookedSeats = $this->getBookedSeats($request);

        foreach ($bookedSeats as $key => $bookedSeat) {
        	if (!count($bookedSeat['booked_seats']) and !isset($booking)) {
                $booking = Booking::create([
                    'user_id' => $request->user_id,
                    'seat_id' => $request->seat_id,
                    'start_station_id' => $bookedSeat['start_station_id'],
                    'end_station_id' => $bookedSeat['end_station_id'],
                ]);
            }
        }

        if (isset($booking))
            return new BookingResource($booking);
        else
            return errorMessage('Selected seat is not available for this trip or expected departure', '404');
    }
}
