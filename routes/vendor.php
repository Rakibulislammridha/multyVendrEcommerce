<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProductReviewController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductVariantItemController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use Illuminate\Support\Facades\Route;

// Vendor routes
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile'); //vendor.profile
Route::put('profile', [VendorProfileController::class, 'updateProfile'])->name('profile.update'); //vendor.profile.update
Route::post('profile', [VendorProfileController::class, 'updatePassword'])->name('profile.update.password'); //vendor.profile.update.password

/** Vendor Shop Profile Route **/
Route::resource('shop-profile', VendorShopProfileController::class);

/** Product Route **/
Route::get('product/get-subcategories', [VendorProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-childCategories', [VendorProductController::class, 'getChildCategories'])->name('product.get-childCategories');
Route::put('product/change-status', [VendorProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('products', VendorProductController::class);

/** Product Image Gallery Route **/
Route::resource('products-image-gallery', VendorProductImageGalleryController::class);

/** Product Variant Route **/
Route::put('products-variant/change-status', [VendorProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', VendorProductVariantController::class);

/** Product Variant Items Route **/
Route::get('products-variant-item/{productId}/{variantId}', [VendorProductVariantItemController::class, 'index'])->name('products-variant-item.index');

Route::get('products-variant-item/create/{productId}/{variantId}', [VendorProductVariantItemController::class, 'create'])->name('products-variant-item.create');

Route::post('products-variant-item', [VendorProductVariantItemController::class, 'store'])->name('products-variant-item.store');

Route::get('products-variant-item-edit/{variantItemId}', [VendorProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');

Route::put('products-variant-item-update/{variantItemId}', [VendorProductVariantItemController::class, 'update'])->name('products-variant-item.update');

Route::delete('products-variant-item/{variantItemId}', [VendorProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');

Route::put('products-variant-item-status', [VendorProductVariantItemController::class, 'changeStatus'])->name('products-variant-item.change-status');

/** Orders Route **/
Route::get('orders', [VendorOrderController::class, 'index'])->name('orders.index');
Route::get('orders/show/{id}', [VendorOrderController::class, 'show'])->name('orders.show');
Route::get('orders/status/{id}', [VendorOrderController::class, 'orderStatus'])->name('orders.status');

/** Reviews Route **/
Route::get('reviews', [VendorProductReviewController::class, 'index'])->name('reviews.index');