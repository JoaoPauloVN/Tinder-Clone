<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
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

Route::post('/auth/register_user', [UserController::class, 'registerUser'])->name('auth.register_user');
Route::post('validate_user', [UserController::class, 'ValidateUser'])->name('validate_user');
Route::post('/user/update_location', [UserController::class, 'UpdateLocation'])->name('user.update_location');
Route::post('/user/action', [UserController::class, 'ActionLikeorNo'])->name('user.action');
Route::post('/user/action/image', [UserController::class, 'updateImage'])->name('user.action.image');
Route::post('/user/action/visible', [UserController::class, 'getUsers'])->name('user.action.visible');
Route::post('/user/action/settings', [UserController::class, 'updateData'])->name('user.action.settings');
Route::post('/user/messages', [UserController::class, 'getMessages'])->name('user.messages');
Route::post('/user/send_message', [UserController::class, 'sendMessage'])->name('user.send_message');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['AuthCheck']], function(){
    
    Route::get('/', [IndexController::class, 'welcome'])->name('welcome');
    Route::get('/app', [IndexController::class, 'home'])->name('home');
    
});



