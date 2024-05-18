<?php

use App\Http\Controllers\Adm\ServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;

use App\Http\Controllers\Adm\HomeController as HomeC;
use App\Http\Controllers\Adm\ServicesController as ServicesC;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Home::class, 'index'])->name('index');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Adm routes
Route::middleware(['auth'])->group(function() {
    Route::get('/adm', function() { return redirect('/adm/home'); });
    
    Route::get('adm/home', [HomeC::class, 'getHome'])->name('getHome');
    
    Route::get('adm/services', [ServicesC::class, 'getServices'])->name('getServices');
});
