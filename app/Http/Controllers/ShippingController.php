<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingRate;

class ShippingController extends Controller
{
    /**
     * Get shipping cost based on selected province, city, and courier.
     */
    public function getShippingCost(Request $request)
    {
        $request->validate([
            'province_id' => 'required|string',
            'city_id' => 'required|string',
            'courier' => 'required|string',
        ]);

        $shippingRate = ShippingRate::where('province_id', $request->province_id)
            ->where('city_id', $request->city_id)
            ->where('courier', $request->courier)
            ->first();

        if ($shippingRate) {
            return response()->json(['cost' => $shippingRate->cost]);
        }

        return response()->json(['error' => 'Shipping cost not found'], 404);
    }
}
