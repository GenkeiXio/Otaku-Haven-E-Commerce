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
                        <div class="product__details__price">{{ $data['product']->price }} <span></div>
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
                        </div>
                        <div class="product__details__widget">
                        </form>
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
            <script src="https://cdn.tailwindcss.com">
            </script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
            <style>
            .shadow-custom {
                box-shadow: 0 4px 6px -1px rgba(219, 68, 68, 0.1), 0 2px 4px -1px rgba(219, 68, 68, 0.06);
            }
            </style>
            </head>
            <body class="bg-gray-100 p-6">
            <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-6">
                <div class="w-full lg:w-1/2">
                <h2 class="text-2xl font-bold mb-4">
                Recent Feedbacks
                </h2>
                <div class="bg-white p-4 rounded-lg shadow-custom mb-4">
                <div class="flex items-center">
                <img alt="Profile picture of a man with a beard" class="w-12 h-12 rounded-full mr-4" height="60" src="https://storage.googleapis.com/a1aa/image/o_isWhgyb2jvaO90Uj6DVw8ghzd2VrvuUaGBBbCJQFw.jpg" width="60"/>
                <div class="flex-1">
                    <h3 class="font-bold">
                    Robert Karmazov
                    </h3>
                    <p class="text-gray-600 text-sm">
                    Auctor magnis proin vitae laoreet ultrices ultricies diam. Sed duis mattis cras lacus donec. Aliquam
                    </p>
                </div>
                <div class="text-yellow-500">
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star-half-alt">
                    </i>
                </div>
                </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-custom mb-4">
                <div class="flex items-center">
                <img alt="Profile picture of a woman with blonde hair" class="w-12 h-12 rounded-full mr-4" height="60" src="https://storage.googleapis.com/a1aa/image/CtCAXPaekv59q0So_OZiYJOkhCnaezHSmjrCJeuIFjA.jpg" width="60"/>
                <div class="flex-1">
                    <h3 class="font-bold">
                    Robert Karmazov
                    </h3>
                    <p class="text-gray-600 text-sm">
                    Auctor magnis proin vitae laoreet ultrices ultricies diam. Sed duis mattis cras lacus donec. Aliquam
                    </p>
                </div>
                <div class="text-yellow-500">
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star-half-alt">
                    </i>
                </div>
                </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-custom mb-4">
                <div class="flex items-center">
                <img alt="Profile picture of a man with short hair" class="w-12 h-12 rounded-full mr-4" height="60" src="https://storage.googleapis.com/a1aa/image/RLCxI8Wfol2E3oaSoFpPAhkq4UHMd-xoJdQB_f4b8oU.jpg" width="60"/>
                <div class="flex-1">
                    <h3 class="font-bold">
                    Robert Karmazov
                    </h3>
                    <p class="text-gray-600 text-sm">
                    Auctor magnis proin vitae laoreet ultrices ultricies diam. Sed duis mattis cras lacus donec. Aliquam
                    </p>
                </div>
                <div class="text-yellow-500">
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star-half-alt">
                    </i>
                </div>
                </div>
                </div>
                </div>
                <!-- Add a Review Section -->
                <div class="w-full lg:w-1/2 shadow-custom">
                <h2 class="text-2xl font-bold mb-4">
                Add a Review
                </h2>
                <form class="bg-white p-6 rounded-lg shadow-md">
                <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">
                    Add Your Rating *
                </label>
                <div class="text-yellow-500">
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                    <i class="fas fa-star">
                    </i>
                </div>
                </div>
                <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">
                    Name *
                </label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="name" placeholder="John Doe" type="text"/>
                </div>
                <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">
                    Email *
                </label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="email" placeholder="JohnDoe@gmail.com" type="email"/>
                </div>
                <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="review">
                    Write Your Review *
                </label>
                <textarea class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="review" placeholder="Write here..."></textarea>
                </div>
                <button class="w-full bg-[#db4444] text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600" type="submit">
                Submit
                </button>
                </form>
                </div>
            </div>
            </div>
            </body>
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
@endsection
