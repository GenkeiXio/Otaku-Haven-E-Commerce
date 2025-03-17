<?php

namespace Database\Seeders;

use App\Models\Setting\WebConfig;
use Illuminate\Database\Seeder;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TYPE[
        //     0 = TEXT,
        //     1 = TEXTAREA,
        //     2 = FILE,
        //     3 = SELECT, 
        // ] 

        // Check if app_name exists before inserting
        if (!WebConfig::where('name', 'app_name')->exists()) {
            WebConfig::create([
                'name'  => 'app_name',
                'label' => 'Application Name',
                'value' => 'Anime Store',
                'type'  => 0
            ]);
        }

        // Check if app_logo exists before inserting
        if (!WebConfig::where('name', 'app_logo')->exists()) {
            WebConfig::create([
                'name'  => 'app_logo',
                'label' => 'Logo',
                'type'  => 2
            ]);
        }
    }
}
