<?php

//use App\Http\Controllers\Adm\HomeController;
//use App\Http\Controllers\Adm\ServicesController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Adm\HomeController as HomeC;
use App\Http\Controllers\Adm\ServicesController as ServicesC;
use App\Http\Controllers\Adm\ContactsController as ContactsC;

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

// Front routes
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/services', [\App\Http\Controllers\ServicesController::class, 'getServices'])->name('services');
Route::get('/contacts', [ContactsController::class, 'getContacts'])->name('contacts');

Auth::routes(['register' => false]);

//Route::get('/home', [App\Http\Controllers\HomeControllerBack::class, 'index'])->name('home');

// Adm routes
Route::middleware(['auth'])->group(function() {
    Route::get('/adm', function() { return redirect('/adm/home'); });
    
    Route::get('adm/home', [HomeC::class, 'getHome'])->name('getHome');
    
    Route::get('adm/services', [ServicesC::class, 'getServices'])->name('getServices');

    Route::get('adm/contacts', [ContactsC::class, 'getContacts'])->name('getContacts');
});
