<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/users', [AdminController::class, 'user']);
Route::get('/foodmenu', [AdminController::class, 'foodmenu']);
Route::post('/uploadfood', [AdminController::class, 'foodupload']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteusers']);
Route::get('/deletemenu/{id}', [AdminController::class, 'deletemenu']);
Route::get('/updatemenu/{id}', [AdminController::class, 'updatemenu']);
Route::post('/update/{id}', [AdminController::class, 'updated']);
Route::get('/viewresurvation', [AdminController::class, 'viewresurvation']);
Route::get('/foodcheaf', [AdminController::class, 'foodchef']);
Route::post('/uploadcheaf', [AdminController::class, 'uploadcheaf']);
Route::get('/updatecheaf/{id}', [AdminController::class, 'updatecheaf']);
Route::post('/updatefoodcheaf/{id}', [AdminController::class, 'updatfoodcheaf']);
Route::get('/deletecheaf/{id}', [AdminController::class, 'deletefoodcheaf']);
Route::post('/resurvation', [AdminController::class, 'resurvation']);
Route::post('/orderconfirm', [HomeController::class, 'orderconfirm']);
Route::get('/orders', [AdminController::class, 'orders']);
Route::get('/search', [AdminController::class, 'search']);
Route::post('/addcart/{id}', [HomeController::class, 'addtocart']);
Route::get('/showcart/{id}', [HomeController::class, 'showtocart']);
Route::get('/remove/{id}', [HomeController::class, 'remove']);
Route::get('/redirects', [HomeController::class, 'redirects']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
