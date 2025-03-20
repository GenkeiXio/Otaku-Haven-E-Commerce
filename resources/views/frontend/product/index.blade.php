@extends('layouts.frontend.app')
@section('content')
     <!-- Breadcrumb Begin -->
     <div class="breadcrumb-option">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
                <!-- Filter Button -->
                <div class="col-lg-6 col-md-6 d-flex justify-content-end">
                    <button class="btn btn-filter" id="toggleFilter">Filter Products</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- FILTER FORM -->
    <div class="container filter-section p-3 border rounded mt-3" id="filterForm" style="display: none;">
        <form method="GET" action="{{ route('frontend.product.index') }}">
            <div class="row">
                <!-- Category Filter -->
                <div class="col-md-4">
                    <label>Category:</label>
                    <select name="category" class="form-control">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price Filter -->
                <div class="col-md-4">
                    <label>Price Range:</label>
                    <div class="d-flex">
                        <input type="number" name="min_price" class="form-control me-2" placeholder="Min ₱" value="{{ request('min_price') }}">
                        <input type="number" name="max_price" class="form-control" placeholder="Max ₱" value="{{ request('max_price') }}">
                    </div>
                </div>

                <!-- Weight Filter -->
                <div class="col-md-4">
                    <label>Weight Range (grams):</label>
                    <div class="d-flex">
                        <input type="number" name="min_weight" class="form-control me-2" placeholder="Min g" value="{{ request('min_weight') }}">
                        <input type="number" name="max_weight" class="form-control" placeholder="Max g" value="{{ request('max_weight') }}">
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-filter">Filter Now</button>
            </div>
        </form>
    </div>

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        @foreach ($data['product'] as $product)
                        <div class="col-lg-3 col-md-4">
                            @component('components.frontend.product-card')
                            @slot('image', asset('storage/' . $product->thumbnails))
                            @slot('route', route('product.show', ['categoriSlug' => $product->Category->slug, 'productSlug' => $product->slug]))
                            @slot('name', $product->name)
                            @slot('price', $product->price)
                            @endcomponent
                        </div>
                        @endforeach
                        <div class="col-lg-12 text-center">
                          {{ $data['product']->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let toggleFilterButton = document.getElementById("toggleFilter");
            let filterForm = document.getElementById("filterForm");

            toggleFilterButton.addEventListener("click", function () {
                filterForm.style.display = "block";
                toggleFilterButton.style.display = "none";
            });
        });

    </script>

    <style>
        .btn-filter {
            background-color: #db4444 !important;
            color: white !important;
            border: none;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-filter:hover {
            background-color: #e07575 !important;
            color: white !important;
            border: none;
        }

    </style>

@endsection
