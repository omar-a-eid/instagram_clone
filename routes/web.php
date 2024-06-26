<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use Livewire\Livewire;
use App\Http\Livewire\ProfilePosts;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Explore;
use App\Livewire\TagController;
use App\Http\Controllers\TagController as TagController2;



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

// Route::get('/', Home::class)->middleware('auth');




Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name("Home");
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/explore', Explore::class)->name("explore");
    Route::get('/explore/tag/{name}', TagController::class)->name("tag.show");
    Route::post('/tags/follow/{tag}', [TagController2::class, "follow"])->name("tag.follow");
    Route::get('/profile/{id}', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{id}/edit', [UserProfileController::class, 'edit'])->name('profileEdit.edit');
    Route::put('/profile/{id}', [UserProfileController::class, 'update'])->name('profileUpdate.update');
    Route::post('/profile', [UserProfileController::class, 'store'])->name('profileStore.store');
    // Route::get('/profile/{userId}', [ProfilePosts::class, '__invoke'])->name('profile.posts');
    
    Route::get('/profile/{id}/followers', [UserProfileController::class, 'followers'])->name('profileFollowers.followers');
    Route::get('/profile/{id}/followings', [UserProfileController::class, 'followings'])->name('profileFollowers.followings');
    Route::delete('/unfollow/{id}', [UserProfileController::class, 'unfollow'])->name('unfollow');
    Route::delete('/removeFollower/{id}', [UserProfileController::class, 'removeFollower'])->name('removeFollower');
    Route::post('/profile/{followerId}/follow', [UserProfileController::class, 'follow'])->name('follow');
    Route::delete('/profile/{id}/photo', [UserProfileController::class, 'destroy'])->name('editPhoto.destroy');
    Route::put('/profile/{id}/edit', [UserProfileController::class, 'updateImage'])->name('profileEdit.edit');
    Route::get('/profile/follower/{followerId}', [UserProfileController::class, 'showFollowerProfile'])->name('profile.showFollower');
});




Route::fallback(function () {
    return redirect('/');
});

require __DIR__ . '/auth.php';