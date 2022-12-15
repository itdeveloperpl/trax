<?php

use Illuminate\Database\Seeder;
use Database\Seeders\CarSeeder;
use Database\Seeders\TripSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(CarSeeder::class);
        $this->call(TripSeeder::class);
    }
}
