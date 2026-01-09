<?php

namespace Controllers;

use Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Car;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard.user', compact('user'));
    }

    public function admin()
    {
        $user = Auth::user();

        if (!$user->is_admin) {
            return redirect()->route('dashboard');
        }

        // Fetch some stats for the admin
        $totalUsers = User::count();
        $totalCars = Car::count();
        $recentCars = Car::latest()->take(5)->get();

        return view('dashboard.admin', compact('user', 'totalUsers', 'totalCars', 'recentCars'));
    }
}
