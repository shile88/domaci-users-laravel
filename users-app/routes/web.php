<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

    //Users routes
    Route::resource('users', UserController::class);

    //Friends routes
    Route::post('send-request-to/{user}', [FriendController::class, 'sendFriendRequest'])->name('send.request');
    Route::delete('reject/{user}', [FriendController::class, 'reject'])->name('reject.request');
    Route::post('accept/{user}', [FriendController::class, 'accept'])->name('accept.request');
    Route::delete('delete/{user}', [FriendController::class, 'delete'])->name('delete.friend');
    Route::delete('delete-request/{user}', [FriendController::class, 'deleteRequest'])->name('delete.request');
    Route::get('my-friends', [FriendController::class, 'index'])->name('friends.index');

    //Messages routes
    Route::get('/friends/{friend}/messages', [MessageController::class, 'messages'])->name('messages.chat');
    Route::post('/friends/{friend}/messages', [MessageController::class, 'sendMessage'])->name('sendMessage.messages');
    Route::delete('/messages/{friend}/{message}', [MessageController::class, 'deleteMessage'])->name('delete.messages');
});



require __DIR__.'/auth.php';
