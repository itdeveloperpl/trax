<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class TripsTest extends TestCase
{
    public function testGetAllTrips()
    {
        $token = env('AUTH_TOKEN');

        $response = $this->get('api/trips', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'car',
                            'miles',
                            'date'
                        ],
                    ],
                ]
            );
    }

    public function testGetOneTrip()
    {
        $token = env('AUTH_TOKEN');

        $response = $this->get('api/trips/1', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        'id',
                        'car',
                        'miles',
                        'date'
                        ],

                ]
            );
    }

    public function testUpdateOneTrip()
    {
        $token = env('AUTH_TOKEN');

        $response = $this->put('api/trips/1',
            [
                'miles' => rand(2,120),
                'car_id' => 1,
                'date'=> date("Y-m-d"),
            ],
            [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }
}
