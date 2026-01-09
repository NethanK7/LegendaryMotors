<?php

namespace Controllers;

use Controllers\Controller;
use App\Models\Allocation;

use App\Models\Car;

class CheckoutController extends Controller
{
    public function index($car_id = null)
    {
        $car = $car_id ? Car::find($car_id) : null;
        
        return view('checkout', [
            'car_id' => $car_id,
            'car' => $car
        ]);
    }
}
