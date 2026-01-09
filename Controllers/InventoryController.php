<?php

namespace Controllers;

use Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        // Default: Get all cars
        $query = Car::query();

        // If category filter is passed
        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // Get Cars
        $cars = $query->get();

        return view('inventory', ['cars' => $cars]);
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }
}
