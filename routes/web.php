<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Ccantimbuhan\LaravelTags\Models\Tag;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/users', 'App\Http\Controllers\UserController@index')->name('index');
Route::get('/users/options', 'App\Http\Controllers\UserController@options')->name('options');

// Tags
// Route::resource('tags', 'App\Http\Controllers\ProductCategoryController');

Route::post('/tags', [App\Http\Controllers\ProductCategoryController::class, 'store'])->name('tags.store');
Route::match(['put', 'patch'], '/tags/{' . Tag::ROUTE_KEY . '}', [App\Http\Controllers\ProductCategoryController::class, 'update'])->name('tags.update');
Route::delete('tags/{' . Tag::ROUTE_KEY . '}', [App\Http\Controllers\ProductCategoryController::class, 'destroy'])->name('tags.destroy');

Route::get('tags/{' . Tag::ROUTE_KEY . '}', [App\Http\Controllers\ProductCategoryController::class, 'show'])->name('tags.show');

Route::resource('product_experiences', App\Http\Controllers\ProductExperienceController::class);

// Products
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::match(['put', 'patch'], '/products/{' . Product::ROUTE_KEY . '}', [ProductController::class, 'update'])->name('products.update');

Route::get('/products/{' . Product::ROUTE_KEY . '}', [ProductController::class, 'show'])->name('products.show');

Route::delete('/products/{' . Product::ROUTE_KEY . '}', [ProductController::class, 'destroy'])->name('products.destroy');