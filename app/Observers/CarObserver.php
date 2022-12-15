<?php

namespace App\Observers;

use App\Models\Car;
use Illuminate\Support\Str;

class CarObserver
{

    public function creating(Car $car)
    {
        $car->code = Str::strip($car->make);
    }

}
