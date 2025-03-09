@extends('layouts.frontend.app')
@section('content')

    <!-- Carousel Section Begin -->
    <section class="carousel-section" style="margin-top: 15px; margin-bottom: 50px;">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2500">
            <div class="carousel-inner">
                <!-- Genshin Impact Banner Slide -->
                <div class="carousel-item active">
                    <div class="genshin-banner">
                        <div class="text-content">
                            <h6>
                                <img src="{{ asset('ashion/img/logo/pyro.png') }}" alt="Pyro Logo" class="category-logo">
                                 Genshin Impact Figure
                            </h6>
                            <h2>Childe Genshin Impact Acrylic stand</h2>
                            <a href="{{ route('category.show', 'acrylic-stand') }}" class="shop-now">Shop Now →</a>
                        </div>
                        <div class="image-content">
                            <img class="genshin-image" src="{{ asset('ashion/img/product/AS1.1.png') }}" alt="Genshin Impact Figure">
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="genshin-banner">
                        <div class="text-content">
                            <h6>
                                <img src="{{ asset('ashion/img/logo/pyro.png') }}" alt="Pyro Logo" class="category-logo">
                                Genshin Impact Cosplay Hoodie
                            </h6>
                            <h2>Genshin Impact Hutao Cosplay Hoodie</h2>
                            <a href="{{ route('category.show', 'hoodie') }}" class="shop-now">Shop Now →</a>
                        </div>
                        <div class="image-content">
                            <img class="genshin-image" src="{{ asset('ashion/img/product/H-Huta.png') }}" alt="Genshin Impact Figure">
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="genshin-banner">
                        <div class="text-content">
                            <h6>
                                <img src="{{ asset('ashion/img/logo/pyro.png') }}" alt="Pyro Logo" class="category-logo">
                                Genshin Impact Button Pin Badge
                            </h6>
                            <h2>TinPlate Pins Bag Badge Brooch</h2>
                            <a href="{{ route('category.show', 'tinplate') }}" class="shop-now">Shop Now →</a>
                        </div>
                        <div class="image-content">
                            <img class="genshin-image" src="{{ asset('ashion/img/product/sekiro_death.png') }}" alt="Genshin Impact Figure">
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="genshin-banner">
                        <div class="text-content">
                            <h6>
                                <img src="{{ asset('ashion/img/logo/pyro.png') }}" alt="Pyro Logo" class="category-logo">
                                Genshin Impact Keqing Opulent Splendor
                            </h6>
                            <h2>Keqing New Skin Cosplay Costume</h2>
                            <a href="{{ route('category.show', 'costume') }}" class="shop-now">Shop Now →</a>
                        </div>
                        <div class="image-content">
                            <img class="genshin-image" src="{{ asset('ashion/img/product/Keqing_Opulent.png') }}" alt="Genshin Impact Figure">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleControls" data-slide-to="1" ></li>
                <li data-target="#carouselExampleControls" data-slide-to="2" ></li>
                <li data-target="#carouselExampleControls" data-slide-to="3" ></li>
            </ol>
        </div>
    </section>
    <!-- Carousel Section End -->

    <!-- Category Section Begin -->
    <div class="label-container">
        <div class="label-icon"></div>
        <span>Categories</span>
    </div>

    <section class="product spad">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-auto">
                <div class="section-title">
                    <h4 class="m-0">Browse by Category</h4>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{ route('category.index') }}">
                    <button class="view-all-btn text-white px-4 py-2 rounded">View All</button>
                </a>
            </div>
        </div>

        <div class="custom-category-wrapper">
            <div class="custom-category-list">
                <a href="{{ route('category.show', 'keychain') }}" class="custom-category-item">
                    <img src="{{ asset('ashion/img/logo/keychain-logo.png') }}" alt="Keychain">
                    <span>Keychain</span>
                </a>
                <a href="{{ route('category.show', 'tote-bag') }}" class="custom-category-item">
                    <img src="{{ asset('ashion/img/logo/tote bag logo.png') }}" alt="Tote Bags">
                    <span>Tote Bags</span>
                </a>
                <a href="{{ route('category.show', 'hoodie') }}" class="custom-category-item">
                    <img src="{{ asset('ashion/img/logo/hoodies.png') }}" alt="Hoodies">
                    <span>Hoodies</span>
                </a>
                <a href="{{ route('category.show', 'eye-mask') }}" class="custom-category-item">
                    <img src="{{ asset('ashion/img/logo/eyemask.png') }}" alt="Eyemask">
                    <span>Eyemask</span>
                </a>
                <a href="{{ route('category.show', 'plush-toy') }}" class="custom-category-item">
                    <img src="{{ asset('ashion/img/logo/bunny-logo.png') }}" alt="Plush Toys">
                    <span>Plush Toys</span>
                </a>
                <a href="{{ route('category.show', 'playmat') }}" class="custom-category-item">
                    <img src="{{ asset('ashion/img/logo/gamepad-logo.png') }}" alt="Gamepad">
                    <span>Gamepad</span>
                </a>
                <a href="{{ route('category.show', 't-shirt') }}" class="custom-category-item">
                    <img src="{{ asset('ashion/img/logo/tshirt-logo.png') }}" alt="T-Shirt">
                    <span>T-Shirt</span>
                </a>
            </div>
        </div>
    </div>
    </section>
    <!-- Category Section End -->


    <!-- Best Selling Section Begin -->
    <div class="label-container">
        <div class="label-icon"></div>
        <span>This Month</span>
    </div>
    <section class="product spad">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="section-title">
                        <h4 class="m-0">Best Selling Products</h4>
                    </div>
                </div>
                <div class="col-auto">
                    <a href="{{ route('category.index') }}">
                        <button class="view-all-btn text-white px-4 py-2 rounded">View All</button>
                    </a>
                </div>
            </div>
            <div class="row property__gallery">
                @foreach ($data['new_categories'] as $new_categories2)
                    @foreach ($new_categories2->Products()->limit(4)->get() as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $new_categories2->slug }}">
                            @component('components.frontend.product-card')
                                @slot('image', asset('storage/' . $product->thumbnails))
                                @slot('route', route('product.show', ['categoriSlug' => $new_categories2->slug, 'productSlug' =>
                                    $product->slug]))
                                @slot('name', $product->name)
                                @slot('price', $product->price)
                            @endcomponent
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    <!-- Best Selling Section End -->

    <!-- Category Section Begin -->
    <div class="game-banner">
        <div class="game-text-content">
            <p>Categories</p>
            <h2>Enhance Your Game Experience</h2>
            <div class="game-timer">
                <div><strong>23</strong><br>Hours</div>
                <div><strong>05</strong><br>Days</div>
                <div><strong>59</strong><br>Minutes</div>
                <div><strong>35</strong><br>Seconds</div>
            </div>
            <a href="{{ route('category.show', 'playmat') }}" class="game-btn">Buy Now!</a>
        </div>
        <div class="game-image-content">
            <img src="{{ asset('ashion/img/product/playmat.png') }}" alt="Game Cards">
        </div>
    </div>
    <!-- Category Section End -->
    

    <!-- Product Section Begin -->
    <div class="label-container">
        <div class="label-icon"></div>
        <span>Our Products</span>
    </div>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>New product</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        @foreach ($data['new_categories'] as $new_categories)
                            <li data-filter=".{{ $new_categories->slug }}">{{ $new_categories->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                @foreach ($data['new_categories'] as $new_categories2)
                    @foreach ($new_categories2->Products()->limit(4)->get()
                as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $new_categories2->slug }}">
                            @component('components.frontend.product-card')
                                @slot('image', asset('storage/' . $product->thumbnails))
                                @slot('route', route('product.show', ['categoriSlug' => $new_categories2->slug, 'productSlug' =>
                                    $product->slug]))
                                    @slot('name', $product->name)
                                    @slot('price', $product->price)
                                @endcomponent
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
    <!-- Product Section End -->

    <!-- New Arrival Section Begin -->
    <div class="label-container">
        <div class="label-icon"></div>
        <span>Featured</span>
    </div>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>New Arrival</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-card">
                        <img src="{{ asset('ashion/img/product/keqing.png') }}" alt="Keqing New Skin">
                        <div class="product-info">
                            <a href="{{ route('category.show', 'costume') }}" class="shop">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="product-card">
                                <img src="{{ asset('ashion/img/product/mona.png') }}" alt="Keychain">
                                <div class="product-info">
                                    <h5>Mona</h5>
                                    <p>Genshin Impact Keychain</p>
                                    <a href="{{ route('category.show', 'keychain') }}" class="shop">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="product-card">
                                <img src="{{ asset('ashion/img/product/sekiro_death.png') }}" alt="Tinplates">
                                <div class="product-info">
                                    <h5>Tinplates</h5>
                                    <p>TinPlate Pins Bag Badge</p>
                                    <a href="{{ route('category.show', 'tinplate') }}" class="shop">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- New Arrival Section End -->

    <!-- Services Section Begin -->
    <div class="full-services">
        <div class="frame-701">
            <div class="services">
                <div class="group-1000005938">
                    <div class="ellipse-6"></div>
                    <div class="ellipse-5"></div>
                </div>
                <img class="icon-delivery" src="{{ asset('ashion/img/logo/fast-delivery.png') }}" alt="FREE AND FAST DELIVERY">
            </div>
            <div class="frame-695">
                <div class="free-and-fast-delivery">FREE AND FAST DELIVERY</div>
                <div class="free-delivery-for-all-orders-over-140">Free delivery for all orders over P 540</div>
            </div>
        </div>
        <div class="frame-702">
            <div class="services">
                <div class="group-1000005938">
                    <div class="ellipse-6"></div>
                    <div class="ellipse-5"></div>
                </div>
                <img class="icon-customer-service" src="{{ asset('ashion/img/logo/customer-service.png') }}" alt="24/7 CUSTOMER SERVICE">
            </div>
            <div class="frame-696">
                <div class="_24-7-customer-service">24/7 CUSTOMER SERVICE</div>
                <div class="friendly-24-7-customer-support">Friendly 24/7 customer support</div>
            </div>
        </div>
        <div class="frame-703">
            <div class="services">
                <div class="group-1000005938">
                    <div class="ellipse-6"></div>
                    <div class="ellipse-5"></div>
                </div>
                <div class="icon-secure">
                    <img class="vuesax-outline-shield-tick" src="{{ asset('ashion/img/logo/protect.png') }}" alt="MONEY BACK GUARANTEE">
                </div>
            </div>
            <div class="frame-697">
                <div class="money-back-guarantee">MONEY BACK GUARANTEE</div>
                <div class="we-reurn-money-within-30-days">We return money within 30 days</div>
            </div>
        </div>
    </div>
    <!-- Services Section End -->

@endsection

<style>

/*---------------------
  CAROUSEL
-----------------------*/
  .carousel-section {
    height: auto;
    margin: 0 auto;
    margin-bottom: 50px; 
  }
  
  .carousel-indicators li {
    background-color: #C4C4C4;
    opacity: 50%;
    width: 18px!important;
    height: 5px; 
  }

  .carousel-indicators .active {
    background-color: #db4444 !important;
  }

  /* Genshin Impact Banner Styling */
  .genshin-banner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: black;
    color: white;
    padding: 40px;
    height: 370px;
    width: 85%;
    margin: 0 auto;
  }

  .category-logo {
    width: 40px; /* Adjust size as needed */
    height: auto;
    margin-right: 8px; /* Add spacing between logo and text */
    vertical-align: middle;
}


  .text-content {
    flex: 1;
    padding-left: 50px;
  }

  .text-content h6 {
    font-size: 14px;
    color: #ff4444;
    margin-bottom: 10px;
  }

  .text-content h2 {
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 15px;
    color: white;
  }

  .shop-now {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
  }

  .shop-now:hover {
    text-decoration: none;
    color: #E07575;
  }

  .image-content {
    flex: 1;
    text-align: right;
  }

  .genshin-image {
    width: auto;
    height: auto;
  }

/*---------------------
  LITTE TITLE
-----------------------*/

  .label-container {
    display: flex;
    align-items: center;
    font-family: Arial, sans-serif;
    font-size: 16px;
    font-weight: bold;
    color: #DB4444; /* Adjusted to match the red shade */
    }

    .label-icon {
        width: 12px;
        height: 24px;
        background-color: #DB4444;
        border-radius: 4px;
        margin-right: 8px;
        margin-left: 100px;
    }

/*---------------------
  CATEGORES
-----------------------*/
.custom-category-container {
    width: 90%;
    max-width: 900px;
    margin: auto;
    text-align: center;
}

.custom-category-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
    text-align: left;
}

.view-all-btn {
    background-color: #DB4444;
    color: white;
    border: none;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s ease;
    text-align: center;
    align-self: flex-end; /* Aligns button to the end */
}

.view-all-btn:hover {
    background-color: #e07575;
}

.custom-category-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 20px; /* Add some spacing */
}

.custom-category-list {
    display: flex;
    gap: 30px; /* Space between items */
}

.custom-category-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 10px;
    transition: 0.3s ease-in-out;
    width: 120px;
    text-align: center;
}

.custom-category-item:hover {
    box-shadow: #e07575;
    background-color: #E07575;
}

.custom-category-item img {
    width: 50px;
    height: 50px;
    margin-bottom: 10px;
}

.custom-category-item span {
    font-size: 14px;
    font-weight: bold;
    color: #333;
}

/*---------------------
  GAME EXPERIENCE
-----------------------*/
        .game-banner {
            display: flex;
            align-items: center;
            background: linear-gradient(to right, #000, #222);
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 85%;
            justify-content: space-between;
            height: 60vh;
            margin: 0 auto;
            margin-bottom: 90px;
        }
        .game-text-content {
            flex: 1;
            padding: 20px;
        }
        .game-text-content h2 {
            font-size: 3em;
            color: white;
        }
        .game-text-content p {
            color: #db4444;
            font-weight: bold;
        }
        .game-timer {
            display: flex;
            gap: 10px;
            margin: 20px 0;
            font-size: 12px;
        }
        .game-timer div {
            background: white;
            color: black;
            padding: 10px;
            border-radius: 50%;
            text-align: center;
        }
        .game-btn {
            background: #db4444;
            color: black;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .game-btn:hover {
            color: #E07575;
        }
        .game-image-content img {
            max-height: 380px;
            max-width: auto;
            border-radius: 5px;
            margin-left: 10px;
        }

/*---------------------
  NEW ARRIVAL
-----------------------*/
        .product-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
        }
        .product-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
        }
        .product-card {
            position: relative;
            overflow: hidden;
            border-radius: 0px;
            background-color: black;
            color: white;
            padding: 10px;
        }
        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 0px;
            display: block;
        }
        .product-info {
            position: relative;
            padding-top: 5px;
            padding-left: 10px;
        }
        .product-info h5 {
            color: white;
        }
        .product-info p {
            font-size: 14px;
            color: #ccc;
        }
        .product-info a {
            color: whitesmoke;
            padding: 0 5px;
            text-decoration: none;
            display: inline-block;
        }
        .product-info a:hover {
            color: #E07575;
        }

/*---------------------
  SERVICES
-----------------------*/

  .full-services {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    gap: 40px;
    align-items: center;
    justify-content: center;
    position: relative;
    padding-bottom: 50px;
  }
  
  .frame-701, .frame-702, .frame-703 {
    display: flex;
    flex-direction: column;
    gap: 16px;
    align-items: center;
    justify-content: flex-start;
    flex-shrink: 0;
    position: relative;
    max-width: 100%;
    text-align: center;
  }
  
  .services {
    flex-shrink: 0;
    width: 100px;
    height: auto;
    position: relative;
  }
  
  .ellipse-6, .ellipse-5 {
    border-radius: 50%;
    position: absolute;
    width: 100%;
    height: 100%;
  }
  
  .ellipse-6 {
    background: var(--primary-1, #2f2e30);
    opacity: 0.3;
  }
  
  .ellipse-5 {
    background: var(--button, #000000);
    width: 72.5%;
    height: 72.5%;
    right: 13.75%;
    left: 13.75%;
    bottom: 13.75%;
    top: 13.75%;
    margin-top: 80px;
  }
  
  .icon-delivery, .icon-customer-service, .icon-secure img {
    width: 50%;
    height: 50%;
    position: absolute;
    right: 25%;
    left: 25%;
    bottom: 25%;
    top: 25%;
    margin-top: 80px;
  }
  
  .frame-695, .frame-696, .frame-697 {
    margin-top: 80px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    align-items: center;
    justify-content: flex-start;
    flex-shrink: 0;
    position: relative;
  }
  
  .free-and-fast-delivery, ._24-7-customer-service, .money-back-guarantee {
    font-size: 18px;
    font-weight: bold;
  }
  
  .free-delivery-for-all-orders-over-140, .friendly-24-7-customer-support, .we-reurn-money-within-30-days {
    font-size: 14px;
    color: #666;
  }
  
  @media (max-width: 768px) {
    .full-services {
      flex-direction: column;
      gap: 24px;
    }
    
    .genshin-banner {
      flex-direction: column;
      text-align: center;
      height: auto;
    }
    
    .text-content {
      padding-left: 0;
    }
  }
  
  @media (max-width: 480px) {
    .full-services {
      gap: 16px;
    }
  
    .frame-701, .frame-702, .frame-703 {
      width: 90%;
      text-align: center;
    }
  }
</style>
