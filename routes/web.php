<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


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

//@@@@@@@@@@@@@@@@ cache, route, view clear route @@@@@@@@@@@@@@@@

Route::get('/clear-all', function () {
    // Clear the application cache
    Artisan::call('cache:clear');

    // Clear the compiled views
    Artisan::call('view:clear');

    // Clear the route cache
    Artisan::call('route:clear');

    // Additional commands for clearing other caches can be added here

    return 'Caches, view, and route cleared successfully.';
});

//  home page 
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');


// web homepage route direct
Route::get('/cv-genarator', function () {
    return view('frontend.pages.cv-genarator');
})->middleware(['auth', 'verified'])->name('cv-genarator');

// web homepage route direct
Route::get('/cv-bank', function () {
    return view('frontend.pages.cv-bank');
})->name('cv.bank');


// web homepage route direct
Route::get('/about', function () {
    return view('frontend.pages.about');
})->name('about');




// group route
// @@@@@@@@@@@@@@@@@@@bakcend@@@@@@@@@@@@@@@@@
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function(){
    Route::get('/', [BackendController::class,'index'])->name('dashboard');
    Route::get('/test', [BackendController::class,'test'])->name('dashboard.test');
    // category 
    // Route::resource('category', CategoryController::class);
    // post 
    // Route::resource('post', PostController::class);
});

// using home controller 
// Route::get('/dashboard', 'App\Http\Controllers\BackendController@index')->name('dashboard');

// route with authentication
// Route::get('/dashboard', 'App\Http\Controllers\BackendController@index')
//     ->name('dashboard')
//     ->middleware(['auth', 'verified']);

// test 
// Route::get('/dashboard/test', 'App\Http\Controllers\BackendController@test')
//     ->name('dashboard.test')
//     ->middleware(['auth', 'verified']);


// Route::get('/dashboard/test', function () {
//     return view('backend.pages.404');
// })->middleware(['auth', 'verified'])->name('dashboard.test');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
