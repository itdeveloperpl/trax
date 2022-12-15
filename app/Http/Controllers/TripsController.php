<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Http\Resources\BooleanResource;
use App\Http\Resources\TripResource;
use App\Models\Trip;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class TripsController extends Controller
{

    public function index(): ResourceCollection
    {
        //query builder
        $trips = DB::table('trips')
            ->select(['trips.*'])
            ->join('cars', 'trips.car_id', '=', 'cars.id')
            ->get();

        return TripResource::collection(Trip::hydrate($trips->toArray()));

        //raw query
        /*
        $trips = DB::select(DB::raw("SELECT t.*  FROM trips t JOIN cars c ON c.id = t.car_id"));
        return TripResource::collection(Trip::hydrate($trips));
        */

        // eloquent
        /*
        return TripResource::collection(Trip::all());
        */
    }

    public function store(TripRequest $request): BooleanResource
    {
        $trip = new Trip($request->only([
            'date',
            'car_id',
            'miles',
        ]));
        return new BooleanResource($trip->save());
    }

    public function show(Trip $trip): TripResource
    {
        return new TripResource($trip);
    }

    public function update(TripRequest $request, Trip $trip): BooleanResource
    {
        return new BooleanResource($trip->update(
            $request->only([
                'date',
                'car_id',
                'miles',
            ]))
        );
    }

    public function destroy(Trip $car): BooleanResource
    {
        return new BooleanResource($car->delete());
    }
}
