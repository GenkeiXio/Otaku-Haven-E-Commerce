<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Address; 

class AddressSeeder extends Seeder
{
    public function run()
    {
        Address::create([
            'user_id' => 1,
            'full_name' => 'Test User',
            'phone_number' => '123456789',
            'region' => 'Test Region',
            'province' => 'Test Province',
            'city' => 'Test City',
            'barangay' => 'Test Barangay',
            'postal_code' => '1234',
            'street_name' => 'Test Street',
            'is_default' => true,
        ]);
    }
}
