<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('layouts.master');
});

Route::get('hidding', [CustomerController::class, 'hidding'])->name('hidding');

Route::resources([
    "customer" => CustomerController::class,
    "users" => UsersController::class,
]);