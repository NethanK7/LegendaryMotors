<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favorites;
        return view('favorites', compact('favorites'));
    }
}
