<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/edit/{id}',[UserController::class,'loadEditForm'])->middleware('auth','admin');
Route::get('/delete/{id}',[UserController::class,'deleteUser'])->middleware('auth','admin');

Route::post('/edit/user',[UserController::class,'EditUser'])->middleware('auth','admin')->name('EditUser');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

