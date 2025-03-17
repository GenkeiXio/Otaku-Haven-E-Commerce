<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run()
    {
        // Check if Albay (id = 1) exists before inserting cities
        $province = DB::table('provinces')->where('id', 1)->first();
        if (!$province) {
            return; // Skip inserting cities if province doesn't exist
        }

        DB::table('cities')->insert([
            ['province_id' => 1, 'city_name' => 'Legazpi'],
            ['province_id' => 1, 'city_name' => 'Tabaco'],
            ['province_id' => 1, 'city_name' => 'Ligao'],
            ['province_id' => 1, 'city_name' => 'Daraga'],
            ['province_id' => 1, 'city_name' => 'Camalig'],
            ['province_id' => 1, 'city_name' => 'Guinobatan'],
            ['province_id' => 1, 'city_name' => 'Jovellar'],
            ['province_id' => 1, 'city_name' => 'Libon'],
            ['province_id' => 1, 'city_name' => 'Malilipot'],
            ['province_id' => 1, 'city_name' => 'Malinao'],
            ['province_id' => 1, 'city_name' => 'Manito'],
            ['province_id' => 1, 'city_name' => 'Oas'],
            ['province_id' => 1, 'city_name' => 'Pio Duran'],
            ['province_id' => 1, 'city_name' => 'Polangui'],
            ['province_id' => 1, 'city_name' => 'Rapu-Rapu'],
            ['province_id' => 1, 'city_name' => 'Santo Domingo'],
            ['province_id' => 1, 'city_name' => 'Tiwi'],
            ['province_id' => 1, 'city_name' => 'Bacacay'],
        ]);
    }
}
