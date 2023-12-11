<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $carsData = [
            [
                'police_number' => 'B1234AB1',
                'color' => 'Red',
                'price' => 25000.00,
                'status' => 'available',
                'year' => 2014
            ],
            [
                'police_number' => 'B5678CD2',
                'color' => 'Blue',
                'price' => 30000.00,
                'status' => 'available',
                'year' => 2014
            ],
            [
                'police_number' => 'B9012EF3',
                'color' => 'Green',
                'price' => 27000.00,
                'status' => 'available',
                'year' => 2014
            ],
            [
                'police_number' => 'B3456GH4',
                'color' => 'Yellow',
                'price' => 32000.00,
                'status' => 'available',
                'year' => 2014
            ],
            [
                'police_number' => 'B7890IJ5',
                'color' => 'White',
                'price' => 28000.00,
                'status' => 'available',
                'year' => 2014
            ],
            [
                'police_number' => 'B2345KL6',
                'color' => 'Black',
                'price' => 31000.00,
                'status' => 'available',
                'year' => 2014
            ],
            [
                'police_number' => 'B6789MN7',
                'color' => 'Silver',
                'price' => 29000.00,
                'status' => 'available',
                'year' => 2014
            ],
            [
                'police_number' => 'B0123OP8',
                'color' => 'Orange',
                'price' => 33000.00,
                'status' => 'available',
                'year' => 2014
            ],
            [
                'police_number' => 'B4567QR9',
                'color' => 'Purple',
                'price' => 26000.00,
                'status' => 'available',
                'year' => 2014
            ],
            [
                'police_number' => 'B8901ST0',
                'color' => 'Brown',
                'price' => 34000.00,
                'status' => 'available',
                'year' => 2014
            ],
        ];

        // Simpan setiap data mobil ke dalam database
        foreach ($carsData as $carData) {
            Car::create($carData);
        }
    }
}
