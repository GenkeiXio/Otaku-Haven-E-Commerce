@extends('frontend.account.index')

@section('title', 'Account Setting')

@section('account_content')


<div class="card">
    <div class="card-header bg-danger text-white ">
        <h5>My Wishlist</h5>
    </div>
    <table class="table">
    <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @if(session()->has('wishlist') && count(session('wishlist')) > 0)
            @php
                $wishlistIds = session('wishlist', []);
                $wishlistProducts = \App\Models\Master\Product::whereIn('id', $wishlistIds)->get();
            @endphp

            @foreach($wishlistProducts as $product)
            <tr id="wishlist-item-{{ $product->id }}">
                <td>
                    <img src="{{ asset($product->thumbnails_path ?? 'default.jpg') }}" alt="{{ $product->name }}" width="90">
                    {{ $product->name }}
                </td>
                <td>{{ formatPeso($product->price) }}</td>
                <td>1</td>
                <td>{{ formatPeso($product->price) }}</td>
                <td>
                <div class="action-buttons">
                    <button class="btn btn-danger remove-wishlist" data-product-id="{{ $product->id }}">Remove</button>
                    <button class="btn btn-success move-to-cart" data-product-id="{{ $product->id }}">Move to Cart</button>
                </div>
            </td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">Your wishlist is empty.</td>
            </tr>
        @endif
        </tbody>
    </table>
    </div>

    <a href="{{ route('product.index') }}">Continue Shopping</a>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function updateWishlistUI(productId, action) {
        let productElement = document.querySelector(`#wishlist-item-${productId}`);
        if (action === "remove" || action === "moveToCart") {
            productElement.remove();
        }
    }

    // Add to Wishlist
    document.querySelectorAll(".add-to-wishlist").forEach(button => {
        button.addEventListener("click", function() {
            let productId = this.getAttribute("data-product-id");

            fetch("{{ route('wishlist.add') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload(); // Reload page to show updated wishlist
            })
            .catch(error => console.error("Error:", error));
        });
    });

    // Remove from Wishlist
    document.querySelectorAll(".remove-wishlist").forEach(button => {
        button.addEventListener("click", function() {
            let productId = this.getAttribute("data-product-id");

            fetch("{{ route('wishlist.remove') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                updateWishlistUI(productId, "remove");
            })
            .catch(error => console.error("Error:", error));
        });
    });

    // Move to Cart
    document.querySelectorAll(".move-to-cart").forEach(button => {
        button.addEventListener("click", function () {
            let productId = this.getAttribute("data-product-id");

            fetch("/cart/add-to-cart", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Item moved to cart!");
                    updateWishlistUI(productId, "moveToCart");
                } else {
                    alert("Something went wrong!");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});                                                 
</script>
    <style>
    .table td {
        vertical-align: middle; /* Para sentro ang content sa bawat row */
    }

    .table td:last-child {
        white-space: nowrap; /* Para hindi mag-wrap ang buttons */
    }

    .btn {
        min-width: 120px; /* Para pare-pareho ang lapad ng buttons */
        text-align: center;
    }

    .action-buttons {
        display: flex;
        gap: 8px; /* Para may spacing ang buttons */
        justify-content: center; /* Para sentro sila */
    }
    </style>
@endsection
