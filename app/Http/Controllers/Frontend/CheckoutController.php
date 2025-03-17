<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature\Cart;
use App\Models\Setting\ShippingAddress;
use App\Models\Province; // Use the Province model
use App\Repositories\CrudRepositories;
use App\Services\Feature\CartService;
use App\Services\Feature\CheckoutService;
use App\Models\City;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $checkoutService, $cartService;

    public function __construct(CheckoutService $checkoutService, CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->checkoutService = $checkoutService;
    }

    public function index()
    {
        $data['carts'] = $this->cartService->getUserCart();
        $data['provinces'] = Province::all(); // Fetch provinces from the database
        $data['shipping_address'] = ShippingAddress::first();
        $data['cities'] = City::where('province_id', 1)->get();
        
        return view('frontend.checkout.index', compact('data'));
    }

    public function process(Request $request)
    {
        try {
            $this->checkoutService->process($request->all());
            return redirect()->route('transaction.index')->with('success', __('message.order_success'));
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
