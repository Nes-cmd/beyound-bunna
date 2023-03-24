<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Shopping\ShopController;
use App\Http\Controllers\OrderController;

use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\SingleProduct;
use App\Http\Livewire\CartDetail;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\WishlistConponent;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Livewire\EditProfile;

Route::view('travel', 'customer-shop.travel')->name('travel');

Route::get('paypal-success', [OrderController::class,'receivePaymens'])->middleware('auth')->name('paypal.success');
Route::get('card-success',  [OrderController::class,'receiveCardPayments'])->middleware('auth')->name('card.success');
Route::get('cancel-payments', function(){return redirect()->route('shop.checkout');})->name('paypal.cancel');
Route::get('/',[ShopController::class, 'index'])->name('shop.index');
Route::get('shop/list/{id?}',ShopComponent::class)->name('shop.list');
Route::get('shop/list/{main}/{id?}',ShopComponent::class)->name('shop.shop-sub-list');
Route::get('shop/product-single/{id?}', SingleProduct::class)->name('shop.product-single');
Route::get('shop/checkout', CheckoutComponent::class)->middleware('auth')->name('shop.checkout');
Route::get('cart/detail', CartDetail::class)->name('shop.cart');
Route::get('blogpost', [BlogPostController::class, 'customerPost'])->name('customer.blogpost');
Route::get('order/confirmation/{tracking}', [OrderController::class, 'orderConfirm'])->name('shop.confirmation');
Route::view('contact', 'customer-shop.contact')->name('shop.contact');
Route::view('about', 'customer-shop.about')->name('shop.about');
Route::middleware('auth')->get('customer/wishlist', WishlistConponent::class)->name('customer.wishlist');

Route::view('privacy', 'policies.privacy');
Route::view('terms', 'policies.terms');
Route::view('disclaimer', 'policies.disclaimer');

Route::controller(CustomerDashboardController::class)->middleware('auth')->prefix('customer/dashboard')->name('customer.dashboard.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('order', 'order')->name('order');
    Route::get('address', 'address')->name('address');
    Route::get('profile', 'profile')->name('profile'); 
}); 
Route::get('customer/dashboard/edit-profile',EditProfile::class)->name('customer.dashboard.edit-profile');

Route::get('test-sdk', function(){
    return view('test-sdk');
});