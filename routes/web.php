<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;

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

Route::get('/profile/{id}', [UserProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{id}/edit', [UserProfileController::class, 'edit'])->name('profileEdit.edit');
Route::put('/profile/{id}', [UserProfileController::class, 'update'])->name('profileUpdate.update');
Route::post('/profile', [UserProfileController::class, 'store'])->name('profileStore.store');

Route::get('/profile/{id}/followers', [UserProfileController::class, 'followers'])->name('profileFollowers.followers');
Route::get('/profile/{id}/followings', [UserProfileController::class, 'followings'])->name('profileFollowers.followings');
Route::delete('/unfollow/{id}', [UserProfileController::class, 'unfollow'])->name('unfollow');
Route::post('/profile/{followerId}/follow', [UserProfileController::class, 'follow'])->name('follow');
Route::delete('/profile/{id}/photo', [UserProfileController::class, 'destroy'])->name('editPhoto.destroy');
Route::put('/profile/{id}/edit', [UserProfileController::class, 'updateImage'])->name('profileEdit.edit');




require __DIR__ . '/auth.php';
