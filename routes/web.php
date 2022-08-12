<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');


Route::get('/users',[UserController::class, 'index']) ->name('users');
Route::post('/users',[UserController::class, 'store']);
Route::post('/users/{id}',[UserController::class, 'update'])->name('users.update');;
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');;

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard',['can' => [
      'create_user' => Auth::user()->can('create', User::class),
    ],]);
})->middleware(['auth', 'verified'])->name('dashboard');




require __DIR__.'/auth.php';