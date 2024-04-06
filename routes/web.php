<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//User Route 

//register routes
Route::get('/register', [UserController::class, 'register'])->name('users.register');
Route::post('/handleRegister', [UserController::class,'handleRegister'])->name('users.handleRegister');

//login routes
Route::get('/login', [UserController::class, 'login'])->name('users.login');
Route::post('/handleLogin', [UserController::class,'handleLogin'])->name('users.handleLogin');





require __DIR__.'/auth.php';
