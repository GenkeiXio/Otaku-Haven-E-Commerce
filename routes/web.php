<?php

use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Feature\OrderController;
use App\Http\Controllers\Backend\Master\CategoryController;
use App\Http\Controllers\Backend\Master\ProductController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\TransacationController;
use App\Http\Controllers\Midtrans\MidtransController;
use App\Http\Controllers\Rajaongkir\RajaongkirController;
use App\Http\Controllers\Setting\WebconfigController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\LocationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::post('payments/midtrans-notification', [MidtransController::class, 'receive']);
Route::post('payments/midtrans-success', [MidtransController::class, 'success']);



Route::prefix('app')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
        

        Route::prefix('customer')->name('customer.')->group(function () {
            Route::get('/', [CustomerController::class, 'index'])->name('index');
        });

        Route::prefix('master')->name('master.')->group(function(){
            
            Route::prefix('category')->name('category.')->group(function(){
                Route::get('/',[CategoryController::class,'index'])->name('index');
                Route::get('/create',[CategoryController::class,'create'])->name('create');
                Route::post('/create',[CategoryController::class,'store'])->name('store');
                Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('delete');
                Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
                Route::post('/update/{id}',[CategoryController::class,'update'])->name('update');
                Route::get('/show/{id}',[CategoryController::class,'show'])->name('show');
            });

            Route::prefix('product')->name('product.')->group(function(){
                Route::get('/',[ProductController::class,'index'])->name('index');
                Route::get('/create',[ProductController::class,'create'])->name('create');
                Route::post('/create',[ProductController::class,'store'])->name('store');
                Route::get('/show/{id}',[ProductController::class,'show'])->name('show');
                Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
                Route::post('/update/{id}',[ProductController::class,'update'])->name('update');
                Route::get('/delete/{id}',[ProductController::class,'delete'])->name('delete');
            });

        });

        Route::prefix('feature')->name('feature.')->group(function(){

            Route::prefix('order')->name('order.')->group(function(){
                Route::get('/{status?}',[OrderController::class,'index'])->name('index');
                Route::get('/detail/{id}',[OrderController::class,'show'])->name('show');
                Route::post('/detail/input-resi',[OrderController::class,'inputResi'])->name('inputresi');
            });

        });

        Route::prefix('setting')->name('setting.')->group(function(){
                Route::get('/shipping',[WebconfigController::class,'shipping'])->name('shipping');
                Route::post('/shipping',[WebconfigController::class,'shippingUpdate'])->name('shippingUpdate');
                
                Route::get('/web',[WebconfigController::class,'web'])->name('web');
                Route::post('/web',[WebconfigController::class,'webUpdate'])->name('web.update');
        });

    });

});

Route::middleware('auth','role:user')->group(function(  ){

    Route::prefix('cart')->name('cart.')->group(function(){
        Route::get('/',[CartController::class,'index'])->name('index');
        Route::post('/store',[CartController::class,'store'])->name('store');
        Route::post('/update',[CartController::class,'update'])->name('update');
        Route::get('/delete/{id}',[CartController::class,'delete'])->name('delete');
        Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    });

    Route::prefix('wishlist')->name('wishlist.')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('index'); // Fix: Removed '/wishlist'
        Route::post('/add', [WishlistController::class, 'add'])->name('add'); // Fix: Removed '/wishlist'
        Route::post('/remove', [WishlistController::class, 'remove'])->name('remove'); // Fix: Removed '/wishlist'
        Route::post('/move-to-cart', [WishlistController::class, 'moveToCart'])->name('moveToCart'); // Fix: Removed '/wishlist'
    });
    


    Route::prefix('transaction')->name('transaction.')->group(function(){
        Route::get('/',[TransacationController::class,'index'])->name('index');
        Route::get('/{invoice_number}',[TransacationController::class,'show'])->name('show');
        Route::get('/{invoice_number}/received',[TransacationController::class,'received'])->name('received');
        Route::get('/{invoice_number}/canceled',[TransacationController::class,'canceled'])->name('canceled');
    });

    Route::prefix('checkout')->name('checkout.')->group(function(){
        Route::get('/',[CheckoutController::class,'index'])->name('index');
        Route::post('/process',[CheckoutController::class,'process'])->name('process');
        Route::post('/shipping/cost', [ShippingController::class, 'getShippingCost'])->name('shipping.cost');
        Route::get('/get-cities/{province_id}', [LocationController::class, 'getCities'])->name('getCities');
    });


    Route::get('/account', [AccountController::class, 'index'])->name('frontend.account.index');
    Route::get('/account/{section}', [AccountController::class, 'loadSection'])->name('frontend.account.section');
    
    // Route to handle profile updates
    Route::put('/account/update', [AccountController::class, 'updateProfile'])->name('frontend.account.update');

    // Route to handle change password updates
    Route::get('/account/changepassword', [AccountController::class, 'changePassword'])->name('frontend.account.changepassword');
    Route::put('/account/updatepassword', [AccountController::class, 'updatePassword'])->name('frontend.account.updatepassword');

});

Route::prefix('rajaongkir')->name('rajaongkir.')->group(function(){
    Route::post('/cost',[RajaongkirController::class,'cost'])->name('cost');
    Route::get('/province/{id}',[RajaongkirController::class,'getCity'])->name('city');
});


Route::get('/', [HomeController::class,'index'])->name('home');
// Route Product
Route::get('/product', [FrontendProductController::class,'index'])->name('product.index');

Route::get('/search',[FrontendProductController::class,'search'])->name('product.search');

// Route for Product List, Review, and Description Pages
Route::view('/review', 'review');
Route::view('/product-description', 'product_description');

// Route Category
Route::get('/category', [FrontendCategoryController::class,'index'])->name('category.index');
Route::get('/category/{slug}', [FrontendCategoryController::class,'show'])->name('category.show');



Route::get('/product/{categoriSlug}/{productSlug}',[FrontendProductController::class,'show'])->name('product.show');

Route::get('/frontend/product', [FrontendProductController::class, 'index'])->name('frontend.product.index');


// Route Policies
Route::get('/policies/faq', function () { return view('frontend.policies.faq'); })->name('frontend.policies.faq');

Route::get('/policies/privacy', function () { return view('frontend.policies.privacy'); })->name('frontend.policies.privacy');

Route::get('/policies/terms', function () { return view('frontend.policies.terms'); })->name('frontend.policies.terms');

// Route Contact Page
Route::get('/contact', function () { return view('frontend.contact'); })->name('frontend.contact');

// Route for Contact Form Submission
Route::post('/contact/send', [ContactController::class, 'sendContactForm'])->name('contact.send');

// Route for Stock
Route::post('/product/{id}/stock', [ProductController::class, 'updateStock'])->name('product.updateStock');

// Route Event Page
Route::get('/event/index', function () { return view('frontend.event.index'); })->name('frontend.event.index');

// Route Reviews Page
Route::get('/reviews/review', function () { return view('frontend.reviews.review'); })->name('frontend.reviews.review');

require __DIR__ . '/auth.php';
