<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
{
    $addresses = Address::where('user_id', Auth::id())->get();
    return view('frontend.account.address', compact('addresses')); 
}



    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'street_name' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'house_number' => 'nullable|string|max:255',
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'region' => $request->region,
            'province' => $request->province,
            'city' => $request->city,
            'barangay' => $request->barangay,
            'postal_code' => $request->postal_code,
            'street_name' => $request->street_name,
            'building' => $request->building,
            'house_number' => $request->house_number,
            'is_default' => Address::where('user_id', Auth::id())->count() == 0, // First address is default
        ]);

        return redirect()->route('frontend.account.address')->with('success', 'Address added successfully.');
    }

    public function edit($id)
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($id);
        return view('frontend.account.edit_address', compact('address')); 
    }
    

    public function update(Request $request, $id)
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'street_name' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'house_number' => 'nullable|string|max:255',
        ]);

        $address->update($request->all());

        return redirect()->route('frontend.account.address')->with('success', 'Address updated successfully.');
    }

    public function destroy($id)
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($id);
        
        if ($address->is_default) {
            return redirect()->back()->with('error', 'Default address cannot be deleted.');
        }

        $address->delete();
        return redirect()->route('frontend.account.address')->with('success', 'Address deleted successfully.');
    }

    public function setDefault($id)
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($id);

        Address::where('user_id', Auth::id())->update(['is_default' => false]);

        $address->update(['is_default' => true]);

        return redirect()->route('frontend.account.address')->with('success', 'Default address updated.');
    }
}
