<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City; // Import your City model

class LocationController extends Controller
{
    public function getCities($province_id)
    {
        // Fetch cities belonging to the selected province
        $cities = City::where('province_id', $province_id)->get();
        
        // Return response as JSON
        return response()->json($cities);
    }
}