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
            ['model' => 'Rocket 900', 'brand' => 'Brabus', 'price' => 550000, 'hp' => 900, '0_60' => 2.8, 'top_speed' => 330, 'img' => 'https://images.unsplash.com/photo-1614200187524-dc4b892acf16?auto=format&fit=crop&q=80&w=800'],
            ['model' => '800 XLP', 'brand' => 'Brabus', 'price' => 650000, 'hp' => 800, '0_60' => 4.8, 'top_speed' => 210, 'img' => 'https://images.unsplash.com/photo-1606220838315-056192d5e927?auto=format&fit=crop&q=80&w=800'],
            ['model' => '900 Rocket R', 'brand' => 'Brabus', 'price' => 520000, 'hp' => 900, '0_60' => 2.5, 'top_speed' => 340, 'img' => 'https://images.unsplash.com/photo-1611859328053-3720522f3851?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'GT 900', 'brand' => 'Brabus', 'price' => 460000, 'hp' => 900, '0_60' => 2.9, 'top_speed' => 315, 'img' => 'https://images.unsplash.com/photo-1503376763036-066120622c74?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'Rocket 1000', 'brand' => 'Brabus', 'price' => 900000, 'hp' => 1000, '0_60' => 2.4, 'top_speed' => 350, 'img' => 'https://images.unsplash.com/photo-1544636331-e26879cd4d9b?auto=format&fit=crop&q=80&w=800'],
            ['model' => '800 GT', 'brand' => 'Brabus', 'price' => 380000, 'hp' => 800, '0_60' => 3.0, 'top_speed' => 315, 'img' => 'https://images.unsplash.com/photo-1614026480209-cd9934144671?auto=format&fit=crop&q=80&w=800'],
        ];

        foreach ($supercars as $data) {
            Car::create([
                'brand' => $data['brand'],
                'model' => $data['model'],
                'year' => 2025,
                'price' => $data['price'],
                'category' => 'supercar',
                'status' => 'available',
                'image_url' => $data['img'],
                'specs' => [
                    'hp' => $data['hp'],
                    '0_60' => $data['0_60'],
                    'top_speed' => $data['top_speed']
                ]
            ]);
        }

        // 2. SUVs (6 units)
        $suvs = [
            ['model' => 'G800 Widestar', 'brand' => 'Brabus', 'price' => 450000, 'hp' => 800, '0_60' => 4.1, 'top_speed' => 240, 'img' => 'https://images.unsplash.com/photo-1609520505218-742184325a75?auto=format&fit=crop&q=80&w=800'],
            ['model' => '900 Superblack', 'brand' => 'Brabus', 'price' => 550000, 'hp' => 900, '0_60' => 3.7, 'top_speed' => 280, 'img' => 'https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'G700 4x4', 'brand' => 'Brabus', 'price' => 380000, 'hp' => 700, '0_60' => 5.0, 'top_speed' => 210, 'img' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'GLS 800', 'brand' => 'Brabus', 'price' => 320000, 'hp' => 800, '0_60' => 3.8, 'top_speed' => 280, 'img' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'G900 Deep Blue', 'brand' => 'Brabus', 'price' => 580000, 'hp' => 900, '0_60' => 3.7, 'top_speed' => 280, 'img' => 'https://images.unsplash.com/photo-1520031441872-26514dd97093?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'GLE 800', 'brand' => 'Brabus', 'price' => 290000, 'hp' => 800, '0_60' => 3.4, 'top_speed' => 300, 'img' => 'https://images.unsplash.com/photo-1605515298946-d062f2e9da53?auto=format&fit=crop&q=80&w=800'],
        ];

        foreach ($suvs as $data) {
             Car::create([
                'brand' => $data['brand'],
                'model' => $data['model'],
                'year' => 2025,
                'price' => $data['price'],
                'category' => 'suv',
                'status' => 'available',
                'image_url' => $data['img'],
                'specs' => [
                    'hp' => $data['hp'],
                    '0_60' => $data['0_60'],
                    'top_speed' => $data['top_speed']
                ]
            ]);
        }

        // 3. Motorbikes (6 units)
        $bikes = [
            ['model' => '1300 R Edition 23', 'brand' => 'Brabus', 'price' => 45000, 'hp' => 180, '0_60' => 3.2, 'top_speed' => 270, 'img' => 'https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?auto=format&fit=crop&q=80&w=800'],
            ['model' => '1300 R Masterpiece', 'brand' => 'Brabus', 'price' => 55000, 'hp' => 180, '0_60' => 3.2, 'top_speed' => 270, 'img' => 'https://images.unsplash.com/photo-1558981285-6f0c94958bb6?auto=format&fit=crop&q=80&w=800'],
            ['model' => '1300 R Stealth', 'brand' => 'Brabus', 'price' => 48000, 'hp' => 180, '0_60' => 3.2, 'top_speed' => 270, 'img' => 'https://images.unsplash.com/photo-1599819811279-d5ad9cccf838?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'KTM 1290 R Evo', 'brand' => 'KTM (Refined)', 'price' => 28000, 'hp' => 180, '0_60' => 3.1, 'top_speed' => 280, 'img' => 'https://images.unsplash.com/photo-1568772585470-fa2642d99d75?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'Diavel 1260 S', 'brand' => 'Ducati (Modified)', 'price' => 35000, 'hp' => 162, '0_60' => 2.6, 'top_speed' => 250, 'img' => 'https://images.unsplash.com/photo-1616423662038-f431180370d0?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'Streetfighter V4', 'brand' => 'Ducati (Refined)', 'price' => 40000, 'hp' => 208, '0_60' => 2.8, 'top_speed' => 290, 'img' => 'https://images.unsplash.com/photo-1622185135505-2d795043906a?auto=format&fit=crop&q=80&w=800'],
        ];

        foreach ($bikes as $data) {
             Car::create([
                'brand' => $data['brand'],
                'model' => $data['model'],
                'year' => 2025,
                'price' => $data['price'],
                'category' => 'motorbike',
                'status' => 'available',
                'image_url' => $data['img'],
                'specs' => [
                    'hp' => $data['hp'],
                    '0_60' => $data['0_60'],
                    'top_speed' => $data['top_speed']
                ]
            ]);
        }
        
         // 4. Luxury (6 units)
        $luxury = [
            ['model' => 'Maybach 600', 'brand' => 'Brabus', 'price' => 450000, 'hp' => 800, '0_60' => 4.5, 'top_speed' => 250, 'img' => 'https://images.unsplash.com/photo-1631295868223-63260951cb28?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'Rolls Royce Ghost', 'brand' => 'Brabus', 'price' => 600000, 'hp' => 700, '0_60' => 4.6, 'top_speed' => 250, 'img' => 'https://images.unsplash.com/photo-1633513444046-7289913165d7?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'S-Class B50', 'brand' => 'Brabus', 'price' => 250000, 'hp' => 500, '0_60' => 4.7, 'top_speed' => 250, 'img' => 'https://images.unsplash.com/photo-1601362840469-51e4d8d58785?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'Masterpiece S680', 'brand' => 'Brabus', 'price' => 550000, 'hp' => 850, '0_60' => 4.0, 'top_speed' => 280, 'img' => 'https://images.unsplash.com/photo-1616422285623-13ff0162193c?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'Cullinan 700', 'brand' => 'Brabus', 'price' => 750000, 'hp' => 700, '0_60' => 4.8, 'top_speed' => 250, 'img' => 'https://images.unsplash.com/photo-1639396348630-d3ee67df0473?auto=format&fit=crop&q=80&w=800'],
            ['model' => 'Bentley Continental', 'brand' => 'Brabus', 'price' => 420000, 'hp' => 750, '0_60' => 3.5, 'top_speed' => 320, 'img' => 'https://images.unsplash.com/photo-1605597792617-640b784a3c20?auto=format&fit=crop&q=80&w=800'],
        ];

        foreach ($luxury as $data) {
             Car::create([
                'brand' => $data['brand'],
                'model' => $data['model'],
                'year' => 2025,
                'price' => $data['price'],
                'category' => 'luxury',
                'status' => 'available',
                'image_url' => $data['img'],
                'specs' => [
                    'hp' => $data['hp'],
                    '0_60' => $data['0_60'],
                    'top_speed' => $data['top_speed']
                ]
            ]);
        }
    }
}
