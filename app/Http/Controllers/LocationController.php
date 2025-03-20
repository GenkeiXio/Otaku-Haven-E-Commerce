<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class LocationController extends Controller
{
    public function getCities($provinceID)
    {
        // Fetch cities belonging to the selected province
        $cities = City::where('province_id', $provinceID)->get();

        // Return JSON response
        return response()->json($cities);
    }
}