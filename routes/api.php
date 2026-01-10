<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Public Routes
Route::post('/login', function (Request $request) {
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Invalid login details'], 401);
    }

    $user = \App\Models\User::where('email', $request['email'])->firstOrFail();
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
           'message' => 'Hi '.$user->name,
           'access_token' => $token, 
           'token_type' => 'Bearer',
           'user' => $user,
    ]);
});

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

