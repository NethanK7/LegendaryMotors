<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use Illuminate\Support\Facades\Session;

class CarConfigurator extends Component
{
    public $car;
    
    // Configurable Options
    public $color = 'obsidian_black';
    public $rims = 'monoblock_y';
    public $kit = 'standard';

    // Pricing Database (Simplified)
    public $options = [
        'colors' => [
            'obsidian_black' => ['name' => 'Obsidian Black Metallic', 'price' => 0, 'hex' => '#000000'],
            'magno_platinum' => ['name' => 'Magno Platinum Matte', 'price' => 5000, 'hex' => '#4a4a4a'],
            'rocket_red' => ['name' => 'Rocket Red', 'price' => 12000, 'hex' => '#8a0f0f'],
            'desert_sand' => ['name' => 'Desert Sand', 'price' => 8000, 'hex' => '#c2b280'],
        ],
        'rims' => [
            'monoblock_y' => ['name' => 'Monoblock Y "Black Platinum"', 'price' => 0, 'img' => 'rim_y.png'],
            'monoblock_z' => ['name' => 'Monoblock Z "Platinum Edition"', 'price' => 8500, 'img' => 'rim_z.png'],
            'monoblock_m' => ['name' => 'Monoblock M "Ceramic"', 'price' => 14000, 'img' => 'rim_m.png'],
        ],
        'kits' => [
            'standard' => ['name' => 'Standard Body (Wide)', 'price' => 0],
            'widestar_carbon' => ['name' => 'Widestar Carbon Package', 'price' => 28000],
            'rocket_edition' => ['name' => 'Rocket Edition Aero', 'price' => 45000],
        ]
    ];

    public function mount(Car $car)
    {
        $this->car = $car;
    }

    public function getTotalProperty()
    {
        $base = $this->car->price;
        $colorPrice = $this->options['colors'][$this->color]['price'];
        $rimsPrice = $this->options['rims'][$this->rims]['price'];
        $kitPrice = $this->options['kits'][$this->kit]['price'];

        return $base + $colorPrice + $rimsPrice + $kitPrice;
    }

    public function reserve()
    {
        // Store configuration in session for the PaymentController
        Session::put('reservation_config', [
            'car_id' => $this->car->id,
            'color' => $this->options['colors'][$this->color]['name'],
            'rims' => $this->options['rims'][$this->rims]['name'],
            'kit' => $this->options['kits'][$this->kit]['name'],
            'total_price' => $this->total
        ]);

        return redirect()->route('payment.checkout');
    }

    public function render()
    {
        return view('livewire.car-configurator', [
            'total' => $this->total
        ]);
    }
}
