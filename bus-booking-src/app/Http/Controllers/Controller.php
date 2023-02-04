<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Booking;
use App\Models\Station;
use App\Models\Trip;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getAvailableTrips($request)
    {
        $seatId = $request->seat_id;
        $expectingDepartureRange = $request->expecting_departure_range;

        $startStationQuery = Station::where('city_id', $request->start_city_id);
        $endStationQuery = Station::where('city_id', $request->end_city_id);
        
        return Trip::selectRaw("
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
            ->when($expectingDepartureRange, function ($query) use ($expectingDepartureRange) {
                $query->where('trips.departure_at', '>=', $expectingDepartureRange['from'])
                ->where('trips.departure_at', '<=', $expectingDepartureRange['to']);
            })
            ->whereRaw('start_station.order_column < end_station.order_column')
            ->get();
    }

    public function getBookedSeats($request)
    {
        $seatId = $request->seat_id;
        $availableTrips = $this->getAvailableTrips($request);

        foreach ($availableTrips as $key => $availableTrip) {
	        $bookedSeats = Booking::when($seatId, function ($query) use ($seatId) {
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
		    	})->get()->pluck('seat_id')->toArray();
		    	
                $results[$availableTrip->id]['start_station_id'] = $availableTrip->start_station_id;
                $results[$availableTrip->id]['end_station_id'] = $availableTrip->end_station_id;
                $results[$availableTrip->id]['bus_id'] = $availableTrip->bus_id;
                $results[$availableTrip->id]['booked_seats'] = $bookedSeats;
        }

		return $results ?? [];
    }
}
