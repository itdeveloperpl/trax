<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Resources\BooleanResource;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CarsController extends Controller
{

    public function index(): ResourceCollection
    {
        return CarResource::collection(Car::all());
    }

    public function store(CarRequest $request): BooleanResource
    {
        $car = new Car($request->only([
            'make',
            'model',
            'year',
        ]));
        return new BooleanResource($car->save());
    }

    public function show(Car $car): CarResource
    {
        return new CarResource($car);
    }

    public function update(CarRequest $request, Car $car): BooleanResource
    {
        return new BooleanResource($car->update(
            $request->only([
                'make',
                'model',
                'year',
            ]))
        );
    }

    public function destroy(Car $car): BooleanResource
    {
        return new BooleanResource($car->delete());
    }
}
