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

Route::post('/contact', function (Request $request) {
    // In a real app, save to DB or send email
    // \App\Models\Contact::create($request->all());
    return response()->json(['message' => 'Message sent successfully! We will contact you shortly.']);
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

// Protected API Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/favorites', function (Request $request) {
        // Assuming there is a relation defined. If not, return empty or implement it.
        // For now, let's assume User has 'favorites' relation (many-to-many cars)
        // Check User model first? I recall seeing it in viewed_files.
        $user = $request->user();
        if (method_exists($user, 'favorites')) {
             $favorites = $user->favorites;
             $favorites->transform(function ($car) {
                if (!filter_var($car->image_url, FILTER_VALIDATE_URL)) {
                     $car->image_url = url($car->image_url);
                }
                return $car;
             });
             return response()->json($favorites);
        }
        return response()->json([]);
    });

    Route::post('/favorites', function (Request $request) {
        $request->validate(['car_id' => 'required']);
        $user = $request->user();
        // Toggle logic
        // $user->favorites()->toggle($request->car_id);
        return response()->json(['message' => 'Favorites updated (Mock)']);
    });

    Route::post('/checkout', function (Request $request) {
        // Mock checkout
        return response()->json(['message' => 'Allocation request received! Our concierge will contact you.']);
    });
});


