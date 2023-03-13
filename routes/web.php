<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\UserController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello-world', function () {
    return 'Hello World';
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class, 'active']);
