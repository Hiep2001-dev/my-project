<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageProductController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShoeOrderController;
use App\Http\Controllers\User\ShoeUserController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserRegisterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    // User
    Route::prefix('admin/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/{id}', [UserController::class, 'show'])->name('admin.users.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{id}/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/{id}/delete', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
    // Brand
    Route::prefix('admin/brands')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('admin.brands.index');
        Route::get('/create', [BrandController::class, 'create'])->name('admin.brands.create');
        Route::post('/store', [BrandController::class, 'store'])->name('admin.brands.store');
        Route::get('/export-excel', [BrandController::class, 'exportExcel'])->name('admin.brands.exportExcel');
        Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
        Route::post('/{id}/update', [BrandController::class, 'update'])->name('admin.brands.update');
        Route::post('/{id}/delete', [BrandController::class, 'destroy'])->name('admin.brands.destroy');
    });
    // Category
    Route::prefix('admin/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/export-excel', [CategoryController::class, 'exportExcel'])->name('admin.categories.exportExcel');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/{id}/update', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::post('/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });
    // Product
    Route::prefix('admin/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
         Route::get('/export-excel', [ProductController::class, 'exportExcel'])->name('admin.products.exportExcel');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/{id}', [ProductController::class, 'show'])->name('admin.products.show');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::post('/{id}/update', [ProductController::class, 'update'])->name('admin.products.update');
        Route::post('/{id}/delete', [ProductController::class, 'destroy'])->name('admin.products.destroy');
       
    });
    // Product Variations
    Route::prefix('products/{productId}/variations')->group(function () {
        Route::get('/', [ProductVariationController::class, 'index'])->name('admin.products.variations.index');
        Route::get('/create', [ProductVariationController::class, 'create'])->name('admin.products.variations.create');
        Route::post('/store', [ProductVariationController::class, 'store'])->name('admin.products.variations.store');
         Route::get('/export-excel', [ProductVariationController::class, 'exportProductVariationsExcel'])->name('products.variations.exportExcel');
        Route::get('/{id}', [ProductVariationController::class, 'show'])->name('admin.products.variations.show');
        Route::get('/{id}/edit', [ProductVariationController::class, 'edit'])->name('admin.products.variations.edit');
        Route::post('/{id}/update', [ProductVariationController::class, 'update'])->name('admin.products.variations.update');
        Route::post('/{id}/delete', [ProductVariationController::class, 'destroy'])->name('admin.products.variations.destroy');
    });
    // Image Products
    Route::prefix('admin/products/{productId}/variations/{variationId}/images')->group(function () {
        Route::get('/', [ImageProductController::class, 'index'])->name('admin.products.images.index');
        Route::get('/create', [ImageProductController::class, 'create'])->name('admin.products.images.create');
        Route::post('/store', [ImageProductController::class, 'store'])->name('admin.products.images.store');
        Route::get('/{imageId}', [ImageProductController::class, 'show'])->name('admin.products.images.show');
        Route::get('/{imageId}/edit', [ImageProductController::class, 'edit'])->name('admin.products.images.edit');
        Route::post('/{imageId}/update', [ImageProductController::class, 'update'])->name('admin.products.images.update');
        Route::post('/{imageId}/delete', [ImageProductController::class, 'destroy'])->name('admin.products.images.destroy');
    });
    // Post Categories
    Route::prefix('admin/posts/categories')->group(function () {
        Route::get('/', [PostCategoryController::class, 'index'])->name('admin.post_categories.index');
        Route::get('/create', [PostCategoryController::class, 'create'])->name('admin.post_categories.create');
        Route::post('/store', [PostCategoryController::class, 'store'])->name('admin.post_categories.store');
        Route::get('/{id}/edit', [PostCategoryController::class, 'edit'])->name('admin.post_categories.edit');
        Route::post('/{id}/update', [PostCategoryController::class, 'update'])->name('admin.post_categories.update');
        Route::post('/{id}/delete', [PostCategoryController::class, 'destroy'])->name('admin.post_categories.destroy');
        // Posts
        Route::prefix('admin/posts')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.posts.index');
            Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
            Route::post('/store', [PostController::class, 'store'])->name('admin.posts.store');
            Route::get('/export-excel', [ProductVariationController::class, 'exportProductVariationsExcel'])->name('admin.products.variations.exportExcel');
            Route::get('/{id}', [PostController::class, 'show'])->name('admin.posts.show');
            Route::get('/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
            Route::put('/{id}', [PostController::class, 'update'])->name('admin.posts.update');
            Route::delete('/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
        });
    });
    // Orders
    Route::prefix('admin/orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
        Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
        Route::put('/{id}/update', [OrderController::class, 'update'])->name('admin.orders.update');
        Route::delete('/{id}/delete', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    });
    // Banners
    Route::prefix('admin/banners')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('admin.banners.index');
        Route::get('/create', [BannerController::class, 'create'])->name('admin.banners.create');
        Route::post('/store', [BannerController::class, 'store'])->name('admin.banners.store');
        Route::get('/{id}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
        Route::put('/{id}/update', [BannerController::class, 'update'])->name('admin.banners.update');
        Route::delete('/{id}/delete', [BannerController::class, 'destroy'])->name('admin.banners.destroy');
    });
});

// Authentication Routes
Route::get('/admin/auth/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/admin/auth/login', [LoginController::class, 'handleLogin'])->name('login.handle');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// USER ROUTES

Route::get('/shoe/index', [UserDashboardController::class, 'index'])->name('shoe.index');
// san pham
Route::get('/shoe/product', [UserProductController::class, 'index'])->name('shoe.product');
Route::get('shoe/product/{id}/sizes-by-color', [ShoeUserController::class, 'getSizesByColor'])->name('shoe.product.sizes-by-color');
Route::get('/shoe/product/{id}', [UserProductController::class, 'show'])->name('shoe.detailproduct');
Route::get('/shoe/category/{id}', [UserProductController::class, 'category'])->name('shoe.category');
Route::get('/shoe/brand/{id}', [UserProductController::class, 'brand'])->name('shoe.brand');
Route::get('/shoe/search', [UserProductController::class, 'search'])->name('shoe.search');

// bai viet
Route::get('/shoe/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/shoe/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/shoe/blog/category/{id}', [BlogController::class, 'category'])->name('blog.category');

// dia chi
Route::get('shoe/address/create', [AddressController::class, 'create'])->name('user.address.create');
Route::post('shoe/address/store', [AddressController::class, 'store'])->name('user.address.store');
Route::get('shoe/address/edit/{id}', [AddressController::class, 'edit'])->name('user.address.edit');
Route::put('shoe/address/update/{id}', [AddressController::class, 'update'])->name('user.address.update');
Route::post('shoe/address/set-default/{id}', [AddressController::class, 'setDefault'])->name('user.address.set-default');
Route::post('shoe/address/destroy/{id}', [AddressController::class, 'destroy'])->name('user.address.destroy');
// gio hang
Route::get('shoe/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('shoe/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('shoe/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::put('shoe/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('shoe/cartdetail', function () {
    return view('shoe.cartdetail');
})->name('cart.index');
Route::get('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
// don hang
Route::post('shoe/checkout', [ShoeOrderController::class, 'placeOrder'])->name('order.placeOrder');
Route::get('shoe/order/{id}', [ShoeOrderController::class, 'detail'])->name('order.detail');
Route::get('shoe/orders', [ShoeOrderController::class, 'history'])->name('order.history');
Route::get('order/{id}/payment', [ShoeOrderController::class, 'payment'])->name('order.payment');
Route::post('order/{id}/payment', [ShoeOrderController::class, 'processPayment'])->name('order.processPayment');
Route::put('order/{id}/cancel', [ShoeOrderController::class, 'cancel'])->name('order.cancel');
// profile
Route::middleware('auth')->group(function () {
    Route::get('shoe/profile', [ShoeUserController::class, 'profile'])->name('shoe.profile');
    Route::post('shoe/profile/update', [ShoeUserController::class, 'updateProfile'])->name('shoe.profile.update');
    Route::get('shoe/profile/change-password', [ShoeUserController::class, 'showChangePasswordForm'])->name('shoe.profile.change-password');
    Route::post('shoe/profile/change-password', [ShoeUserController::class, 'changePassword'])->name('shoe.password.update');
});

Route::get('/shoe/introduce', function () {
    return view('shoe.introduce');
})->name('shoe.introduce');
Route::get('/shoe/contact', function () {
    return view('shoe.contact');
})->name('shoe.contact');
Route::get('/shoe/signin', function () {
    return view('shoe.signin');
})->name('shoe.signin');

Route::get('/shoe/signup', function () {
    return view('shoe.signup');
})->name('shoe.signup');

// Login and Register
Route::get('/shoe/signin', [UserLoginController::class, 'showLoginForm'])->name('shoe.signin');
Route::post('/shoe/signin', [UserLoginController::class, 'login'])->name('shoe.login');
Route::post('/user/register', [UserRegisterController::class, 'register'])->name('user.register');
Route::post('/shoe/logout', function () {
    Auth::logout();

    return redirect()->route('shoe.index');
})->name('shoe.logout');
Route::get('/check-email', function (Request $request) {
    $exists = User::where('email', $request->email)->exists();

    return response()->json(['exists' => $exists]);
});
