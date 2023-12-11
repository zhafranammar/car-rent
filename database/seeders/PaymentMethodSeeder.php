<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            'BCA',
            'BNI',
            'BRI',
            'BJB',
            'BSI',
            'BNC',
            'CIMB',
            'DBS',
            'MANDIRI',
            'PERMATA',
        ];

        // Loop untuk membuat payment method
        foreach ($paymentMethods as $method) {
            PaymentMethod::create([
                'name' => "Virtual Account " . $method,
                'code' => $method,
                'description' => "Virtual Account " . $method,
            ]);
        }
    }
}
