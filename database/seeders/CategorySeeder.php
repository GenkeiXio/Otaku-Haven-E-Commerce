<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'T-Shirts', 'slug' => 't-shirts', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hoodies', 'slug' => 'hoodies', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Accessories', 'slug' => 'accessories', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
