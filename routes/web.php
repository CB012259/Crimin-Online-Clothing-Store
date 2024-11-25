<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerSupportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\PurchaseController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Customer-Support', function () {
    return view('CustomerSupport');
});Route::get('/Promotions', function () {
    return view('Promotions');
});Route::get('/Places', function () {
    return view('Places');
});
Route::get('/Size', function () {
    return view('size');
});
Route::get('/admin',[AdminController::class ,'admin'])->middleware('auth','admin')->name('admin.dashboard');
Route::get('/home',[AdminController::class ,'admin']);
Route::get('/login',[LoginController::class ,'login'])->name('login');
Route::get('/logout',[LoginController::class ,'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');
Route::get('/users',[UserController::class,'loadAllUsers']) ->middleware('auth','admin');
Route::get('/add/user',[UserController::class,'loadAddUserForm']) ->middleware('auth','admin');

Route::post('/add/user',[UserController::class,'AddUser'])->middleware('auth', 'admin')->name('AddUser');
Route::get('/admin/questions', [AdminController::class, 'viewQuestions'])->middleware('auth', 'admin')->name('admin.questions');
Route::get('/edit/{id}',[UserController::class,'loadEditForm'])->middleware('auth','admin');
Route::get('/delete/{id}',[UserController::class,'deleteUser'])->middleware('auth','admin');

Route::post('/edit/user',[UserController::class,'EditUser'])->middleware('auth','admin')->name('EditUser');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
    Route::delete('/admin/reviews/{review}', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/', [ProductController::class, 'showWelcomePage'])->name('welcome');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::get('/filter', [ProductController::class, 'welcome'])->name('products.filter');
Route::post('/questions', [CustomerSupportController::class, 'storeQuestion'])->name('questions.store');

Route::post('/reviews', [CustomerSupportController::class, 'storeReview'])->name('reviews.store');
Route::get('/products/{id}', [CustomerSupportController::class, 'showProduct'])->name('products.show');
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/admin/subscribers', [AdminController::class, 'subscribe'])->name('admin.subscribers')->middleware('auth', 'admin');
Route::delete('/subscribers/{id}', [SubscriptionController::class, 'destroy'])->name('subscribers.destroy')->middleware('auth', 'admin');




Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions.index')->middleware('auth', 'admin');
Route::get('/promotions/create', [PromotionController::class, 'create'])->name('promotions.create')->middleware('auth', 'admin');
Route::post('/promotions', [PromotionController::class, 'store'])->name('promotions.store')->middleware('auth', 'admin');
Route::get('/Promotions', [PromotionController::class, 'show'])->name('promotions.show');
Route::delete('/promotions/{promotion}', [PromotionController::class, 'destroy'])->name('promotions.destroy')->middleware('auth', 'admin');



Route::get('/purchase', [purchaseController::class, 'show'])->name('purchase.show');
Route::post('/purchase', [purchaseController::class, 'store'])->name('purchase.store');
Route::get('/success', [purchaseController::class, 'success'])->name('success');

