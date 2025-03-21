@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="">{{ $data['product']->Category->name }}</a>
                        <span>{{ $data['product']->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="{{ asset($data['product']->thumbnails_path) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $data['product']->name }} <span>Category: {{ $data['product']->Category->name }}</span></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div>
                        <form action="{{ route('cart.store') }}" method="POST">
                        <div class="product__details__price">{{$data['product']->price }} <span></div>
                        @csrf
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" name="cart_qty" value="1">
                                </div>
                                <input type="hidden" name="cart_product_id" value="{{ $data['product']->id }}">
                            </div>
                            <button type="submit" class="cart-btn"><span class="icon_bag_alt"></span> Add to Cart</button>
                            </form>
                            <!-- Wishlist Button -->
                            <button type="button" class="wishlist-btn {{ in_array($data['product']->id, session('wishlist', [])) ? 'active' : '' }}" 
                                data-product-id="{{ $data['product']->id }}">
                                <i class="fa fa-heart"></i>
                            </button>
                        

                        </div>
                        <div class="product__details__widget">
                        
                            <ul>
                                <li>
                                    <span>Weight: </span>
                                    <p>{{ $data['product']->weight }} Grams</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Product Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Product Description</h6>
                                {!! $data['product']->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </title>
            <!-- Recent Feedbacks Section -->
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>Other Products</h5>
                    </div>
                </div>
               @foreach ($data['product_related'] as $product_related)
               <div class="col-lg-3 col-md-4 col-sm-6">
                @component('components.frontend.product-card')
                @slot('image', asset('storage/' . $product_related->thumbnails))
                @slot('route', route('product.show', ['categoriSlug' => $product_related->Category->slug, 'productSlug' =>
                    $product_related->slug]))
                    @slot('name', $product_related->name)
                    @slot('price', $product_related->price)
                @endcomponent
                </div>
               @endforeach
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".wishlist-btn").forEach(button => {
            button.addEventListener("click", function() {
            let productId = this.getAttribute("data-product-id");
            let isActive = this.classList.contains("active");

            let formData = new FormData();
            formData.append("product_id", productId);
            formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));

            fetch(isActive ? "{{ route('wishlist.remove') }}" : "{{ route('wishlist.add') }}", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                this.classList.toggle("active", !isActive);

                // Reload wishlist page automatically
                if (!isActive) {
                    setTimeout(() => {
                        window.location.href = "{{ route('wishlist.index') }}";
                    }, 500);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
     // Makinig sa wishlistUpdated event at alisin ang active class
     document.addEventListener("wishlistUpdated", function(event) {
        let productId = event.detail.productId;
        let heartButton = document.querySelector(`.wishlist-btn[data-product-id="${productId}"]`);
        if (heartButton) {
            heartButton.classList.remove("active");
        }
    });
});
</script>

                            <style>
                            .wishlist-btn {
                                font-size: 32px;
                                color: #ccc;
                                margin-left: 7px;
                                background: none;
                                border: none;
                                cursor: pointer;
                                transition: color 0.3s ease;
                            }
 
                            .wishlist-btn.active {
                                color: red;
                            }
                            </style>

@endsection
