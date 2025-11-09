<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\UserRegisterController;
use App\Models\User;
use App\Http\Controllers\User\UserLoginController;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariationController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageProductController;
use App\Http\Controllers\User\UserProductController;



//Admin Routes
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    //User
    Route::prefix('admin/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/{id}', [UserController::class, 'show'])->name('admin.users.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/{id}/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/{id}/delete', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
    //Brand
    Route::prefix('admin/brands')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('admin.brands.index');
        Route::get('/create', [BrandController::class, 'create'])->name('admin.brands.create');
        Route::post('/store', [BrandController::class, 'store'])->name('admin.brands.store');
        Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
        Route::post('/{id}/update', [BrandController::class, 'update'])->name('admin.brands.update');
        Route::post('/{id}/delete', [BrandController::class, 'destroy'])->name('admin.brands.destroy');
    });
    //Category
    Route::prefix('admin/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/{id}/update', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::post('/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    }); 
    //Product
    Route::prefix('admin/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/{id}', [ProductController::class, 'show'])->name('admin.products.show');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::post('/{id}/update', [ProductController::class, 'update'])->name('admin.products.update');
        Route::post('/{id}/delete', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        
    });
    //Product Variations

    Route::prefix('products/{productId}/variations')->group(function () {
        Route::get('/', [ProductVariationController::class, 'index'])->name('admin.products.variations.index');
        Route::get('/create', [ProductVariationController::class, 'create'])->name('admin.products.variations.create');
        Route::post('/store', [ProductVariationController::class, 'store'])->name('admin.products.variations.store');
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
    Route::get('admin/products/{productId}/variations/{variationId}/images', [ImageProductController::class, 'index'])
    ->name('admin.products.images.index');
    Route::get('admin/products/{productId}/variations/{variationId}/images/create', [ImageProductController::class, 'create'])
    ->name('admin.products.images.create');
});

// Authentication Routes
Route::get('/admin/auth/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/admin/auth/login', [LoginController::class, 'handleLogin'])->name('login.handle');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



//USER ROUTES

Route::get('/shoe/index', [UserProductController::class, 'index'])->name('shoe.index');
Route::get('/shoe/product', [UserProductController::class, 'index'])->name('shoe.product');
Route::get('/shoe/product/{id}', [UserProductController::class, 'show'])->name('shoe.detailproduct');
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


//Login and Register
Route::get('/shoe/signin', [UserLoginController::class, 'showLoginForm'])->name('shoe.signin');
Route::post('/shoe/signin', [UserLoginController::class, 'login'])->name('shoe.login');
Route::post('/user/register', [UserRegisterController::class, 'register'])->name('user.register');
// Route::get('/shoe/index', [UserLoginController::class, 'index'])->name('shoe.index');
Route::post('/shoe/logout', function () {
    Auth::logout();
    return redirect()->route('shoe.index');
})->name('shoe.logout');
Route::get('/check-email', function(Request $request) {
    $exists = User::where('email', $request->email)->exists();
    return response()->json(['exists' => $exists]);
});