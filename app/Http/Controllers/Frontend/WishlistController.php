<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Master\Product;

class WishlistController extends Controller
{
    // Display wishlist page
    public function index()
    {
        $wishlistIds = Session::get('wishlist', []);
        $wishlistProducts = Product::whereIn('id', $wishlistIds)->get();

        return view('frontend.account.wishlist', ['wishlist' => $wishlistProducts]);
    }

    // Add item to wishlist
    public function add(Request $request)
{
    $wishlist = session()->get('wishlist', []);
    $productId = $request->input('product_id');

    if (!in_array($productId, $wishlist)) {
        $wishlist[] = $productId;
        session()->put('wishlist', $wishlist);
    }

    return response()->json([
        'success' => true,
        'message' => 'Added to wishlist',
        'wishlist_count' => count($wishlist) // Send count for UI updates
    ]);
}

    // Remove item from wishlist
    public function remove(Request $request)
    {
        $wishlist = Session::get('wishlist', []);
        $productId = $request->input('product_id');

        if (($key = array_search($productId, $wishlist)) !== false) {
            unset($wishlist[$key]);
            Session::put('wishlist', array_values($wishlist));
        }

        return response()->json([
            'success' => true, 
            'message' => 'Removed from wishlist',
            'wishlist_count' => count($wishlist)
        ]);
    }

    // Move item from wishlist to cart
    public function moveToCart(Request $request)
{
    $productId = $request->input('product_id');

    // Hanapin ang produkto sa database
    $product = Product::find($productId);
    if (!$product) {
        return redirect()->route('wishlist.index')->with('error', 'Product not found.');
    }

    // Kunin ang wishlist mula session
    $wishlist = session()->get('wishlist', []);

    if (!in_array($productId, $wishlist)) {
        return redirect()->route('wishlist.index')->with('error', 'Product not found in wishlist.');
    }

    // Tanggalin mula wishlist
    $wishlist = array_diff($wishlist, [$productId]);
    session()->put('wishlist', array_values($wishlist));

    // Kunin ang cart mula session
    $cart = session()->get('cart', []);

    // Idagdag sa cart kung wala pa
    if (!isset($cart[$productId])) {
        $cart[$productId] = [
            "id" => $product->id,
            "name" => $product->name,
            "price" => $product->price,
            "quantity" => 1,
            "image" => $product->image
        ];
    } else {
        $cart[$productId]['quantity'] += 1;
    }

    // I-save ang updated cart sa session
    session()->put('cart', $cart);

    // Debugging step: Check if function is triggered
    dd("Move to Cart Triggered", $productId, session()->get('wishlist'), session()->get('cart'));

    return redirect()->route('cart.index')->with('success', 'Product moved to cart successfully.');
}
}