<?php

namespace App\Livewire;

use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FavoriteButton extends Component
{
    public Car $car;
    public bool $isFavorited = false;

    public function mount(Car $car)
    {
        $this->car = $car;
        if (Auth::check()) {
            $this->isFavorited = Auth::user()->favorites()->where('car_id', $car->id)->exists();
        }
    }

    public function toggle()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($this->isFavorited) {
            Auth::user()->favorites()->detach($this->car->id);
            $this->isFavorited = false;
        } else {
            Auth::user()->favorites()->attach($this->car->id);
            $this->isFavorited = true;
        }
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
