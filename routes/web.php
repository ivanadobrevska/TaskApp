<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'show'])->name('signin');
Route::post('/login', [UserController::class, 'login']);
Route::get('/user/{id}', [UserController::class, 'showUser'])->name('user');
Route::post('/addActivity', [ActivityController::class, 'addActivity']);
Route::post('/sendEmail', [EmailController::class, 'send']);
Route::get('/signout', [UserController::class, 'signOut']);
Route::get('/report/{id}', [EmailController::class, 'report']);
Route::post('/selectInterval', [ActivityController::class, 'selectInterval']);
Route::get('/selectedInterval', [ActivityController::class, 'selectedInterval']);