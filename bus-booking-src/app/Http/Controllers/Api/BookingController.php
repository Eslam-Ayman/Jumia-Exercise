<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Station;
use App\Models\Trip;
use App\Models\Seat;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
    	dd($this->isAvailable($request));
        $booking = Booking::create($request->validated());

        return back();
    }

    public function isAvailable(BookingRequest $request)
    {
        $seatId = $request->seat_id;

        $startStationQuery = Station::where('city_id', $request->start_city_id);
        $endStationQuery = Station::where('city_id', $request->end_city_id);
        
        $availableTrips = Trip::selectRaw("
        	trips.id,
        	trips.title,
        	buses.id as bus_id,
        	buses.name as bus_name,
        	buses.seats_count,
	        start_station.id as start_station_id,
	        start_station.city_id as start_city_id,
	        start_station.order_column as start_order,
	        end_station.id as end_station_id,
	        end_station.city_id as end_city_id,
	        end_station.order_column as end_order
        	")->joinSub($startStationQuery, 'start_station', function ($join) {
                $join->on('trips.id', 'start_station.trip_id');
            })->joinSub($endStationQuery, 'end_station', function ($join) {
                $join->on('trips.id', 'end_station.trip_id');
            })
            ->join('buses', function ($join) use ($seatId) {
                $join->on('trips.bus_id', 'buses.id');
                if ($seatId)
                	$join->whereRaw("buses.id = (select bus_id from `seats` where `id` = $seatId)");
            })
            ->whereRaw('start_station.order_column < end_station.order_column')
            ->groupBy(\DB::raw("trips.id"))
            ->get();

        foreach ($availableTrips as $key => $availableTrip) {
	        $bookedSeats[] = Booking::when($seatId, function ($query) use ($seatId) {
	        		$query->where('seat_id', $seatId);
	        	})
	    		->where(function($query) use ($availableTrip){
		    		$query->where(function($query) use ($availableTrip){
		    			$query->where('start_station_id', '<=' ,$availableTrip->start_station_id)
		    			->where('end_station_id', '>' ,$availableTrip->start_station_id);
		    		})->orWhere(function($query)use ($availableTrip){
		    			$query->where('start_station_id', '<' ,$availableTrip->end_station_id)
		    			->where('end_station_id', '>=' ,$availableTrip->end_station_id);
		    		})->orWhere(function($query)use ($availableTrip){
		    			$query->where('start_station_id', '>=' ,$availableTrip->start_station_id)
		    			->where('end_station_id', '<=' ,$availableTrip->end_station_id);
		    		});
		    	})->get()->pluck('seat_id');
		    	// ->whereRaw("seat_id NOT IN (SELECT id FROM seats where bus_id = $availableTrip->bus_id")
		    	dd($bookedSeats);
        }
    }
}
