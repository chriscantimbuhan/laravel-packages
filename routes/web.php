<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Models\Media;
use App\Models\Product;
use App\Models\User;
use Ccantimbuhan\LaravelRatings\Models\Rating;
use Ccantimbuhan\LaravelTags\Models\Tag;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/users', 'App\Http\Controllers\UserController@index')->name('index');
Route::get('/users/options', 'App\Http\Controllers\UserController@options')->name('options');
Route::post('/users/{' . User::ROUTE_KEY . '}/rate', [UserController::class, 'rate'])->name('users.rate');

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

Route::post('/products/{' . Product::ROUTE_KEY . '}/rate', [ProductController::class, 'rate'])->name('products.rate');
Route::get('/products/{' . Product::ROUTE_KEY . '}/average-rating', [ProductController::class, 'averageRating'])->name('products.average-rating');

Route::get('/ratings/{' . Rating::ROUTE_KEY . '}', [RatingController::class, 'show'])->name('ratings.show');
Route::post('/ratings/{' . Rating::ROUTE_KEY . '}/approval', [RatingController::class, 'approval'])->name('ratings.approval');

// Media
Route::match(['put', 'patch'], '/media/{' . Media::ROUTE_KEY . '}', [MediaController::class, 'update'])->name('media.update');