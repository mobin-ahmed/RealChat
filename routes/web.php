<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [UserController::class, 'index']);
Route::get('/signup-page', [UserController::class, 'signupPage']);
Route::get('/login-page', [UserController::class, 'loginPage']);
Route::get('/user-page', [UserController::class, 'userPage']);
Route::get('/chat-page', [UserController::class, 'chatPage']);
Route::post('/do-signup', [UserController::class, 'doSignup']);
Route::post('/do-login', [UserController::class, 'doLogin']);
Route::get('/chat-duet/{uid1}', [UserController::class, 'chatDuet']);
Route::get('/back-to-user', [UserController::class, 'backToUser']);
Route::post('/in-msg', [MessageController::class, 'inMsg']);
// Route::get('/fetch-msg', [MessageController::class, 'fetchMsgData']);
// Route::post('/set-data', [MessageController::class, 'setData']);
