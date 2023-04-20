<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth
route::post('/register', [AuthController::class, 'register']);
route::post('/authenticate', [AuthController::class, 'authenticate']);
route::get('/logout', [AuthController::class, 'logout']);

// Page 
route::get('/', [PageController::class, 'index']);
route::get('/register', [PageController::class, 'register']);
route::get('/login', [PageController::class, 'login'])->name('login');
route::get('/home', [PageController::class, 'home'])->middleware('auth');
route::get('/profile', [PageController::class, 'profile'])->middleware('auth');
route::get('/account', [PageController::class, 'account'])->middleware('admin');
route::get('/item/detail/{item}', [PageController::class, 'itemDetail'])->middleware('auth');
route::get('/logout/success', [PageController::class, 'successLogout']);

// profile
route::post('/dpchange', [ProfileController::class, 'dpchange'])->middleware('auth');
route::post('/edit_profile', [ProfileController::class, 'edit_profile'])->middleware('auth');
route::get('/profile/success', [ProfileController::class, 'profile_success'])->middleware('auth');

// account
route::get('/delete/{id}', [AccountController::class, 'deleteAccount'])->middleware('admin');
route::get('/update/role/{id}', [AccountController::class, 'updateRole'])->middleware('admin');
route::post('/update/role', [AccountController::class, 'updateRoleProcess'])->middleware('admin');

// cart
route::get('/cart/buy/{item}', [CartController::class, 'buyItem'])->middleware('auth');
route::get('/cart', [CartController::class, 'cart'])->middleware('auth');
route::get('/cart/delete/{key}', [CartController::class, 'deleteCart'])->middleware('auth');
route::get('/check_out', [CartController::class, 'check_out'])->middleware('auth');
route::get('/success', [CartController::class, 'success'])->middleware('auth');

// localization
Route::get('/profile/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('pages.profile', ['title' => 'Profile']);
});