<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

// web homepage route direct
// Route::get('/', function () {
//     return view('frontend.pages.index');
// });

// using home controller 
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

// web homepage route direct
Route::get('/cv-genarator', function () {
    return view('frontend.pages.cv-genarator');
})->name('cv-genarator');


// web homepage route direct
Route::get('/about', function () {
    return view('frontend.pages.about');
})->name('about');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
