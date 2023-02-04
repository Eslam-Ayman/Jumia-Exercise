<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seat;
use App\Http\Requests\SeatRequest;
use App\Http\Resources\SeatResource;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SeatRequest $request)
    {
        $bookedSeats = collect( $this->getBookedSeats($request) );
        $busIds = $bookedSeats->pluck('bus_id')->toArray();
        $bookedSeatIds = $bookedSeats->pluck('booked_seats')->collapse()->toArray();

        $seats = Seat::whereIn('bus_id',  $busIds)
                ->whereNotIn('id', $bookedSeatIds)
                ->paginate(12);

        return SeatResource::collection($seats);        
    }
}