<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing cars
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Car::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        // 1. Supercars (6 units)
        $supercars = [
            ['model' => 'Rocket 900', 'brand' => 'Brabus', 'price' => 550000, 'hp' => 900, '0_60' => 2.8, 'top_speed' => 330],
            ['model' => '800 XLP', 'brand' => 'Brabus', 'price' => 650000, 'hp' => 800, '0_60' => 4.8, 'top_speed' => 210], // Actually SUV based but marketed high
            ['model' => '900 Rocket R', 'brand' => 'Brabus', 'price' => 520000, 'hp' => 900, '0_60' => 2.5, 'top_speed' => 340],
            ['model' => 'GT 900', 'brand' => 'Brabus', 'price' => 460000, 'hp' => 900, '0_60' => 2.9, 'top_speed' => 315],
            ['model' => 'Rocket 1000', 'brand' => 'Brabus', 'price' => 900000, 'hp' => 1000, '0_60' => 2.4, 'top_speed' => 350],
            ['model' => '800 GT', 'brand' => 'Brabus', 'price' => 380000, 'hp' => 800, '0_60' => 3.0, 'top_speed' => 315],
        ];

        foreach ($supercars as $data) {
            Car::create([
                'brand' => $data['brand'],
                'model' => $data['model'],
                'year' => 2025,
                'price' => $data['price'],
                'category' => 'supercar', // Matches filter
                'status' => 'available',
                'image_url' => 'images/brabus/supercar_seed.png',
                'specs' => [
                    'hp' => $data['hp'],
                    '0_60' => $data['0_60'],
                    'top_speed' => $data['top_speed']
                ]
            ]);
        }

        // 2. SUVs (6 units)
        $suvs = [
            ['model' => 'G800 Widestar', 'brand' => 'Brabus', 'price' => 450000, 'hp' => 800, '0_60' => 4.1, 'top_speed' => 240],
            ['model' => '900 Superblack', 'brand' => 'Brabus', 'price' => 550000, 'hp' => 900, '0_60' => 3.7, 'top_speed' => 280],
            ['model' => 'G700 4x4', 'brand' => 'Brabus', 'price' => 380000, 'hp' => 700, '0_60' => 5.0, 'top_speed' => 210],
            ['model' => 'GLS 800', 'brand' => 'Brabus', 'price' => 320000, 'hp' => 800, '0_60' => 3.8, 'top_speed' => 280],
            ['model' => 'G900 Deep Blue', 'brand' => 'Brabus', 'price' => 580000, 'hp' => 900, '0_60' => 3.7, 'top_speed' => 280],
            ['model' => 'GLE 800', 'brand' => 'Brabus', 'price' => 290000, 'hp' => 800, '0_60' => 3.4, 'top_speed' => 300],
        ];

        foreach ($suvs as $data) {
             Car::create([
                'brand' => $data['brand'],
                'model' => $data['model'],
                'year' => 2025,
                'price' => $data['price'],
                'category' => 'suv', // Matches filter
                'status' => 'available',
                'image_url' => 'images/brabus/suv_seed.png',
                'specs' => [
                    'hp' => $data['hp'],
                    '0_60' => $data['0_60'],
                    'top_speed' => $data['top_speed']
                ]
            ]);
        }

        // 3. Motorbikes (6 units)
        $bikes = [
            ['model' => '1300 R Edition 23', 'brand' => 'Brabus', 'price' => 45000, 'hp' => 180, '0_60' => 3.2, 'top_speed' => 270],
            ['model' => '1300 R Masterpiece', 'brand' => 'Brabus', 'price' => 55000, 'hp' => 180, '0_60' => 3.2, 'top_speed' => 270],
            ['model' => '1300 R Stealth', 'brand' => 'Brabus', 'price' => 48000, 'hp' => 180, '0_60' => 3.2, 'top_speed' => 270],
            ['model' => 'KTM 1290 R Evo', 'brand' => 'KTM (Refined)', 'price' => 28000, 'hp' => 180, '0_60' => 3.1, 'top_speed' => 280],
            ['model' => 'Diavel 1260 S', 'brand' => 'Ducati (Modified)', 'price' => 35000, 'hp' => 162, '0_60' => 2.6, 'top_speed' => 250],
            ['model' => 'Streetfighter V4', 'brand' => 'Ducati (Refined)', 'price' => 40000, 'hp' => 208, '0_60' => 2.8, 'top_speed' => 290],
        ];

         foreach ($bikes as $data) {
             Car::create([
                'brand' => $data['brand'],
                'model' => $data['model'],
                'year' => 2025,
                'price' => $data['price'],
                'category' => 'motorbike', // Matches filter
                'status' => 'available',
                'image_url' => 'images/brabus/motorbike_seed.png',
                'specs' => [
                    'hp' => $data['hp'],
                    '0_60' => $data['0_60'],
                    'top_speed' => $data['top_speed']
                ]
            ]);
        }
        
         // 4. Luxury (6 units)
        $luxury = [
            ['model' => 'Maybach 600', 'brand' => 'Brabus', 'price' => 450000, 'hp' => 800, '0_60' => 4.5, 'top_speed' => 250],
            ['model' => 'Rolls Royce Ghost', 'brand' => 'Brabus', 'price' => 600000, 'hp' => 700, '0_60' => 4.6, 'top_speed' => 250],
            ['model' => 'S-Class B50', 'brand' => 'Brabus', 'price' => 250000, 'hp' => 500, '0_60' => 4.7, 'top_speed' => 250],
            ['model' => 'Masterpiece S680', 'brand' => 'Brabus', 'price' => 550000, 'hp' => 850, '0_60' => 4.0, 'top_speed' => 280],
            ['model' => 'Cullinan 700', 'brand' => 'Brabus', 'price' => 750000, 'hp' => 700, '0_60' => 4.8, 'top_speed' => 250],
            ['model' => 'Bentley Continental', 'brand' => 'Brabus', 'price' => 420000, 'hp' => 750, '0_60' => 3.5, 'top_speed' => 320],
        ];

        foreach ($luxury as $data) {
             Car::create([
                'brand' => $data['brand'],
                'model' => $data['model'],
                'year' => 2025,
                'price' => $data['price'],
                'category' => 'luxury', // Matches filter
                'status' => 'available',
                'image_url' => 'images/brabus/limo_seed.png',
                'specs' => [
                    'hp' => $data['hp'],
                    '0_60' => $data['0_60'],
                    'top_speed' => $data['top_speed']
                ]
            ]);
        }
    }
}
