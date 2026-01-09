<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cars', function () {
    $cars = \App\Models\Car::all();
    $cars->transform(function ($car) {
        if (!filter_var($car->image_url, FILTER_VALIDATE_URL)) {
             $car->image_url = url($car->image_url);
        }
        return $car;
    });
    return response()->json($cars);
});
