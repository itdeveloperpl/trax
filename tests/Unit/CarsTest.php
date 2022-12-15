<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CarsTest extends TestCase
{
    public function testGetAllCars()
    {
        $token = env('AUTH_TOKEN');

        $response = $this->get('api/cars', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'make',
                            'model',
                            'year',
                            'code',
                            'trip_count',
                            'trip_miles',
                            'created_at',
                            'updated_at',
                        ],
                    ],
                ]
            );
    }

    public function testGetOneCar()
    {
        $token = env('AUTH_TOKEN');

        $response = $this->get('api/cars/neque4', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                            'id',
                            'make',
                            'model',
                            'year',
                            'code',
                            'trip_count',
                            'trip_miles',
                            'created_at',
                            'updated_at',
                        ],

                ]
            );
    }

    public function testUpdateOneCar()
    {
        $token = env('AUTH_TOKEN');

        $response = $this->put('api/cars/neque4',
            [
                'model' => Str::random(12),
                'make'=> 'Neque.'.rand(1,100),
                'year'=> rand(2018,date("Y")),
            ],
            [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }
}
