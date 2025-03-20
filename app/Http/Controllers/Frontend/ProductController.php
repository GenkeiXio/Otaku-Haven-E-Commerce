<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Master\Product;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new CrudRepositories(new Product());
    }

    public function index(Request $request)
{
    $query = Product::query();

    if ($request->filled('category')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('name', $request->category);
        });
    }

      // ✅ Ensure both price AND weight conditions are met
    if ($request->filled('min_price') && $request->filled('max_price') && 
    $request->filled('min_weight') && $request->filled('max_weight')) {
    
    // ✅ Filter only products that match BOTH conditions
    $query->whereBetween('price', [$request->min_price, $request->max_price])
          ->whereBetween('weight', [$request->min_weight, $request->max_weight]);

} elseif ($request->filled('min_price') && $request->filled('max_price')) {
    // ✅ If only price filter is set
    $query->whereBetween('price', [$request->min_price, $request->max_price]);

} elseif ($request->filled('min_weight') && $request->filled('max_weight')) {
    // ✅ If only weight filter is set
    $query->whereBetween('weight', [$request->min_weight, $request->max_weight]);
}

    // Fetch the filtered products
    $data['product'] = $query->paginate(12)->appends(request()->query());

    // Fetch unique categories from the categories table
    $categories = \App\Models\Master\Category::pluck('name');

    return view('frontend.product.index', compact('data', 'categories'));
}

    


    public function show($categoriSlug, $productSlug)
    {
        $data['product'] = $this->product->Query()->where('slug', $productSlug)->first();
        $data['product_related'] = $this->product->Query()->whereNotIn('slug', [$productSlug])->limit(4)->get();
        return view('frontend.product.show', compact('data'));
    }

    public function search(Request $request)
    {
        $data['product'] = $this->product->Query()->where('name', 'like', '%' . $request->q . '%')->paginate(12);
        return view('frontend.product.search', compact('data'));
    }
}
