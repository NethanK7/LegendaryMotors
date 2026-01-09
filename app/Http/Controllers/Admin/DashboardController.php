<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_cars' => Car::count(),
            'total_users' => User::count(),
            'total_allocations' => Allocation::count(),
            'revenue' => Allocation::whereIn('allocations.status', ['paid', 'reserved'])
                ->join('cars', 'allocations.car_id', '=', 'cars.id')
                ->sum('cars.price') ?? 0,
        ];

        $recent_allocations = Allocation::with(['user', 'car'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_allocations'));
    }
}
