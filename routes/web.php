<?php

use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', function () {
    $featuredProducts = \App\Models\Product::where('is_featured', true)->where('is_active', true)->take(4)->get();
    $featuredGallery = \App\Models\Gallery::where('is_featured', true)->where('is_active', true)->orderBy('order')->take(6)->get();
    return view('landing', compact('featuredProducts', 'featuredGallery'));
})->name('home');

// Products page
Route::get('/products', function (Illuminate\Http\Request $request) {
    $query = \App\Models\Product::where('is_active', true);
    
    // Category filter
    if ($request->has('category') && $request->category) {
        $query->where('category', $request->category);
    }
    
    // Search filter
    if ($request->has('search') && $request->search) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
    }
    
    // Price range filter
    if ($request->has('min_price') && $request->min_price) {
        $query->where('price', '>=', $request->min_price);
    }
    if ($request->has('max_price') && $request->max_price) {
        $query->where('price', '<=', $request->max_price);
    }
    
    // Featured filter
    if ($request->has('featured') && $request->featured) {
        $query->where('is_featured', true);
    }
    
    // Sale filter
    if ($request->has('sale') && $request->sale) {
        $query->where('is_sale', true);
    }
    
    // New filter
    if ($request->has('new') && $request->new) {
        $query->where('is_new', true);
    }
    
    $products = $query->get();
    $categories = \App\Models\Product::where('is_active', true)->distinct()->pluck('category')->filter();
    
    return view('products', compact('products', 'categories'));
})->name('products');

// Gallery page
Route::get('/gallery', function () {
    $gallery = \App\Models\Gallery::where('is_active', true)->orderBy('order')->get();
    return view('gallery', compact('gallery'));
})->name('gallery');

// Product detail page (SEO-friendly)
Route::get('/product/{id}', function ($id) {
    $product = \App\Models\Product::findOrFail($id);
    return view('product-detail', compact('product'));
})->name('product.detail');

Auth::routes();

// Cart routes
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'placeOrder'])->name('checkout.place');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    // User routes
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\User\UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [App\Http\Controllers\User\UserController::class, 'profile'])->name('profile');
        Route::put('/profile', [App\Http\Controllers\User\UserController::class, 'updateProfile'])->name('profile.update');
        Route::get('/orders', [App\Http\Controllers\User\UserController::class, 'orders'])->name('orders.index');
        Route::get('/orders/{id}', [App\Http\Controllers\User\UserController::class, 'showOrder'])->name('orders.show');
        Route::get('/offers', [App\Http\Controllers\User\UserController::class, 'offers'])->name('offers');
    });
    
    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Users management
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
            Route::get('/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('show');
            Route::get('/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
            Route::delete('/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy');
        });
        
        // Products management
        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
            Route::get('/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('show');
            Route::get('/{product}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
            Route::put('/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
            Route::delete('/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('destroy');
        });

        // Categories management
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
            Route::get('/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('show');
            Route::get('/{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
            Route::put('/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
            Route::delete('/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('destroy');
        });

        // Orders management
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('index');
            Route::get('/{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('show');
            Route::put('/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('update-status');
            Route::put('/{order}/payment-status', [App\Http\Controllers\Admin\OrderController::class, 'updatePaymentStatus'])->name('update-payment-status');
        });

        // Payments management
        Route::prefix('payments')->name('payments.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('index');
            Route::get('/{payment}', [App\Http\Controllers\Admin\PaymentController::class, 'show'])->name('show');
            Route::put('/{payment}/confirm', [App\Http\Controllers\Admin\PaymentController::class, 'confirm'])->name('confirm');
        });

        // Hero Sections management
        Route::prefix('hero-sections')->name('hero-sections.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\HeroSectionController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\HeroSectionController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\HeroSectionController::class, 'store'])->name('store');
            Route::get('/{heroSection}/edit', [App\Http\Controllers\Admin\HeroSectionController::class, 'edit'])->name('edit');
            Route::put('/{heroSection}', [App\Http\Controllers\Admin\HeroSectionController::class, 'update'])->name('update');
            Route::delete('/{heroSection}', [App\Http\Controllers\Admin\HeroSectionController::class, 'destroy'])->name('destroy');
        });

        // Gallery management
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('store');
            Route::get('/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'show'])->name('show');
            Route::get('/{gallery}/edit', [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('edit');
            Route::put('/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('update');
            Route::delete('/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('destroy');
        });
    });
});
