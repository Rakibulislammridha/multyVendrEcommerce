<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminReviewController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\FooterGridThreeController;
use App\Http\Controllers\Backend\FooterGridTwoController;
use App\Http\Controllers\Backend\FooterInfoController;
use App\Http\Controllers\Backend\FooterSocialController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalSettingCOntroller;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RazorpaySettingController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StripeSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VendorListController;
use App\Http\Controllers\Backend\VendorRequestController;
use App\Http\Controllers\ProductVariantController;
use Illuminate\Support\Facades\Route;

// Admin routes
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

// Profile Route
Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

/**  Slider Route  **/ 
Route::resource('slider', SliderController::class);

/** Category Route **/ 
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

/** Sub Category Route **/ 
Route::put('sub-category/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);

/** Child Category Route **/ 
Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
Route::resource('child-category', ChildCategoryController::class);

/** Brand Route **/
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);

/** Vendor Profile Route **/
Route::resource('vendor-profile', AdminVendorProfileController::class);

/** Products Route **/
Route::get('product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-childCategories', [ProductController::class, 'getChildCategories'])->name('product.get-childCategories');
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('products', ProductController::class);

/** Product Image Gallery Route **/
Route::resource('products-image-gallery', ProductImageGalleryController::class);

/** Product Variant Route **/
Route::put('products-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', ProductVariantController::class);

/** Product Variant Items Route **/
Route::get('products-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('products-variant-item.index');

Route::get('products-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('products-variant-item.create');

Route::post('products-variant-item', [ProductVariantItemController::class, 'store'])->name('products-variant-item.store');

Route::get('products-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');

Route::put('products-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('products-variant-item.update');

Route::delete('products-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');

Route::put('products-variant-item-status', [ProductVariantItemController::class, 'changeStatus'])->name('products-variant-item.change-status');

/** Review Product Routes **/
Route::get('reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
Route::put('reviews/change-status', [AdminReviewController::class, 'changeStatus'])->name('reviews.change-status');

/** Seller Product Routes **/
Route::get('seller-products', [SellerProductController::class, 'index'])->name('seller-products.index');
Route::get('seller-pending-products', [SellerProductController::class, 'pendingProducts'])->name('seller-pending-products.index');
Route::put('change-approve-status', [SellerProductController::class, 'changeApproveStatus'])->name('change-approve-status');

/** Flash Sale Routes **/
Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change', [FlashSaleController::class, 'changeShowAtHomeStatus'])->name('flash-sale.show-at-home.status-change');
Route::put('flash-sale-status', [FlashSaleController::class, 'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale/{id}', [FlashSaleController::class, 'destroy'])->name('flash-sale.destroy');

/** Coupon Routes **/
Route::put('coupons/change-status', [CouponController::class, 'changeStatus'])->name('coupons.change-status');
Route::resource('coupons', CouponController::class);

/** Order routes **/
Route::get('order-status', [OrderController::class, 'changeOrderStatus'])->name('order.status');
Route::get('payment-status', [OrderController::class, 'changePaymentStatus'])->name('payment.status');

Route::get('pending-order', [OrderController::class, 'pendingOrders'])->name('pending-order');
Route::get('processed-order', [OrderController::class, 'processedOrders'])->name('processed-order');
Route::get('dropped-off-order', [OrderController::class, 'droppedOffOrders'])->name('dropped-off-order');
Route::get('shipped-order', [OrderController::class, 'shippedOrders'])->name('shipped-order');
Route::get('out-for-delivery-order', [OrderController::class, 'outForDeliveryOrders'])->name('out-for-delivery-order');
Route::get('delivered-order', [OrderController::class, 'deliveredOrders'])->name('delivered-order');
Route::get('canceled-order', [OrderController::class, 'canceledOrders'])->name('canceled-order');

Route::resource('orders', OrderController::class);

/** Order Transaction Routes **/
Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');

/** Setting Routes **/
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('general-setting-update', [SettingController::class, 'generalSettingUpdate'])->name('general-setting-update');
Route::put('email-setting-update', [SettingController::class, 'emailConfigSettingUpdate'])->name('email-setting-update');

/** Home Page Setting Routes **/
Route::get('home-page-setting', [HomePageSettingController::class, 'index'])->name('home-page-setting.index');
Route::put('popular-category-section', [HomePageSettingController::class, 'updatePopularCategorySection'])->name('popular-category-section');
Route::put('product-slider-section-one', [HomePageSettingController::class, 'updateProductSliderSectionOne'])->name('product-slider-section-one');
Route::put('product-slider-section-two', [HomePageSettingController::class, 'updateProductSliderSectionTwo'])->name('product-slider-section-two');
Route::put('product-slider-section-three', [HomePageSettingController::class, 'updateProductSliderSectionThree'])->name('product-slider-section-three');

/** Subscribers Routes **/
Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscriber.index');
Route::delete('subscribers/{id}', [SubscriberController::class, 'destroy'])->name('subscriber.destroy');
Route::post('subscribers-send-mail', [SubscriberController::class, 'sendMail'])->name('subscribers-send-mail');

/** Advertisement Routes **/
Route::get('advertisement', [AdvertisementController::class, 'index'])->name('advertisement.index');
Route::put('advertisement/homepage-banner-section-one', [AdvertisementController::class, 'homepageBannerSectionOne'])->name('advertisement.homepage-banner-section-one');
Route::put('advertisement/homepage-banner-section-two', [AdvertisementController::class, 'homepageBannerSectionTwo'])->name('advertisement.homepage-banner-section-two');
Route::put('advertisement/homepage-banner-section-three', [AdvertisementController::class, 'homepageBannerSectionThree'])->name('advertisement.homepage-banner-section-three');
Route::put('advertisement/homepage-banner-section-four', [AdvertisementController::class, 'homepageBannerSectionFour'])->name('advertisement.homepage-banner-section-four');
Route::put('advertisement/product-page-banner', [AdvertisementController::class, 'productPageBanner'])->name('advertisement.product-page-banner');
Route::put('advertisement/cart-page-banner', [AdvertisementController::class, 'cartPageBanner'])->name('advertisement.cart-page-banner');

/** Vendor Request Routes **/
Route::get('vendor-requests', [VendorRequestController::class, 'index'])->name('vendor-requests.index');
Route::get('vendor-requests/{id}/show', [VendorRequestController::class, 'show'])->name('vendor-requests.show');
Route::put('vendor-requests/{id}/change-status', [VendorRequestController::class, 'changeStatus'])->name('vendor-requests.change-status');

/** Customer List Routes **/
Route::get('customers', [CustomerListController::class, 'index'])->name('customers.index');
Route::put('customers/change-status', [CustomerListController::class, 'changeStatus'])->name('customers.change-status');

/** Vendor List Routes **/
Route::get('vendors', [VendorListController::class, 'index'])->name('vendors.index');
Route::put('vendors/change-status', [VendorListController::class, 'changeStatus'])->name('vendors.change-status');

/** Footer Routes **/
Route::put('footer-socials/change-status', [FooterSocialController::class, 'changeStatus'])->name('footer-socials.change-status');
Route::resource('footer-info', FooterInfoController::class);
Route::resource('footer-socials', FooterSocialController::class);

/** Footer Grid Two Routes **/
Route::put('footer-grid-two/change-status', [FooterGridTwoController::class, 'changeStatus'])->name('footer-grid-two.change-status');
Route::put('footer-grid-two/change-title', [FooterGridTwoController::class, 'changeTitle'])->name('footer-grid-two.change-title');
Route::resource('footer-grid-two', FooterGridTwoController::class);

/** Footer Grid Three Routes **/
Route::put('footer-grid-three/change-status', [FooterGridThreeController::class, 'changeStatus'])->name('footer-grid-three.change-status');
Route::put('footer-grid-three/change-title', [FooterGridThreeController::class, 'changeTitle'])->name('footer-grid-three.change-title');
Route::resource('footer-grid-three', FooterGridThreeController::class);

/** Shipping Rule Routes **/
Route::put('shipping-rule/change-status', [ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);

/** Payment Settings Routes **/
Route::get('payment-settings', [PaymentSettingController::class, 'index'])->name('payment-settings.index');

/** Paypal Settings Routes **/
Route::resource('paypal-setting', PaypalSettingCOntroller::class);

/** Stripe Settings Routes **/
Route::put('stripe-setting/{id}', [StripeSettingController::class, 'update'])->name('stripe-setting.update');

/** Razorpay Settings Routes **/
// Route::put('razorpay-setting/{id}', [RazorpaySettingController::class, 'update'])->name('razorpay-setting.update');