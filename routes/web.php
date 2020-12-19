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
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/user/{id}', [UserController::class, 'showUser'])->name('user')->middleware('user');
Route::post('/addActivity', [ActivityController::class, 'addActivity'])->name('addActivity');
Route::post('/sendEmail', [EmailController::class, 'send'])->name('sendEmail');
Route::get('/signout', [UserController::class, 'signOut'])->name('signout');
Route::get('/report/{id}', [EmailController::class, 'report'])->name('report');
Route::post('/selectInterval', [ActivityController::class, 'selectInterval'])->name('selectInterval');
// Route::get('/selectedInterval', [ActivityController::class, 'selectedInterval'])->name('selectedInterval');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/registerUser', [UserController::class, 'registerUser'])->name('registerUser');