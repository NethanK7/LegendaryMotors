<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->paginate(10);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|in:supercar,suv,luxury,motorbike',
            'status' => 'required|string|in:available,reserved,sold',
            'image_url' => 'required|string', // Simple URL input for now
        ]);

        // Default specs
        $validated['specs'] = [
            'hp' => $request->input('hp', 0),
            '0_60' => $request->input('0_60', '0.0'),
            'top_speed' => $request->input('top_speed', '0'),
        ];

        Car::create($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully.');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|in:supercar,suv,luxury,motorbike',
            'status' => 'required|string|in:available,reserved,sold',
            'image_url' => 'required|string',
        ]);

        $validated['specs'] = [
            'hp' => $request->input('hp', $car->specs['hp'] ?? 0),
            '0_60' => $request->input('0_60', $car->specs['0_60'] ?? '0.0'),
            'top_speed' => $request->input('top_speed', $car->specs['top_speed'] ?? '0'),
        ];

        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }
}
