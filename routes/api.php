<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostCommentController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class, 'view']);

Route::get('/users/{id}/orders/{order_id}/comments/{comment_id}', [UserController::class, 'viewComment']) 
-> where ([
    'id' => '\d+',
    'order_id' => '\d+',
    'comment_id' => '\d+'
]) ;

Route::post('/signup', [AuthController::class, 'signup']);

Route::resources([
    'posts' => PostController::class,
    'posts/comments' => PostCommentController::class,
]);

Route::post('/login', [AuthController::class, 'login']);

//Route::get('/me', [AuthController::class, 'me']) -> middleware('auth:sanctum');

Route::middleware('auth:sanctum') -> group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/logout_all', [AuthController::class, 'logoutAll']);
});

Route::post('/users/add-post', [PostController::class, 'create']);

Route::get('/users/posts/{id}', [PostController::class, 'show']);