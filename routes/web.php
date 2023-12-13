<?php

use App\Http\Controllers\CommentHistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\MoviepageController;
use App\Http\Controllers\ActorpageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
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

Route::get('/', [FrontpageController::class, 'getInfo']);

Route::get('frontpage', [FrontpageController::class, 'getInfo'])->name('frontpage');

Route::get('/movie/{id}', [MoviepageController::class, 'show']);

Route::get('/search', [SearchController::class,'searchMovies'])->name('searchMovies');

Route::get('/actor/{id}', [ActorpageController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user-test', function () {
    return view('user-test');
})->middleware(['auth', 'verified'])->name('user-test');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/commenthistory', [CommentHistoryController::class, 'getComments'])
->middleware(['auth', 'verified'])->name('commenthistory');

Route::delete('/commenthistory/{id}', [CommentHistoryController::class, 'destroy'])->name('commenthistory.destroy');

require __DIR__ . '/auth.php';
