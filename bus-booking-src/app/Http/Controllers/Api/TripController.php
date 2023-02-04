<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Http\Requests\TripRequest;
use App\Http\Resources\TripResource;

class TripController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TripRequest $request)
    {
    	$trip = Trip::create($request->only(['bus_id', 'title']));
    	$stations = collect($request->stations)->sortBy('order_column')->toArray();
    	$trip->stations()->createMany($stations);
    	return new TripResource($trip);
    }
}