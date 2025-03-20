<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\City;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $bicolProvinces = [
            'Albay' => ['Legazpi City', 'Daraga', 'Tabaco City', 'Ligao City', 'Guinobatan'],
            'Camarines Norte' => ['Daet', 'Jose Panganiban', 'Labo', 'Mercedes', 'Paracale'],
            'Camarines Sur' => ['Naga City', 'Iriga City', 'Pili', 'Calabanga', 'Libmanan'],
            'Catanduanes' => ['Virac', 'San Andres', 'Caramoran', 'Baras', 'Bagamanoc'],
            'Masbate' => ['Masbate City', 'Aroroy', 'Milagros', 'Cataingan', 'Dimasalang'],
            'Sorsogon' => ['Sorsogon City', 'Bulusan', 'Gubat', 'Irosin', 'Casiguran'],
        ];

        foreach ($bicolProvinces as $provinceName => $cities) {
            $province = Province::create(['province_name' => $provinceName]);

            foreach ($cities as $cityName) {
                City::create([
                    'province_id' => $province->id,
                    'city_name' => $cityName
                ]);
            }
        }
    }
}
