<?php

//use App\Http\Controllers\Adm\HomeController;
//use App\Http\Controllers\Adm\ServicesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Adm\HomeController as HomeC;
use App\Http\Controllers\Adm\ServicesController as ServicesC;
use App\Http\Controllers\Adm\ContactsController as ContactsC;
use App\Http\Controllers\Adm\MovePositionController as MovePositionC;

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
Route::get('/services', [ServicesController::class, 'getServices'])->name('services');
Route::get('/services/{name}', [ServicesController::class, 'getService'])->name('service');
Route::get('/contacts', [ContactsController::class, 'getContacts'])->name('contacts');

Auth::routes(['register' => false]);

//Route::get('/home', [App\Http\Controllers\HomeControllerBack::class, 'index'])->name('home');

// Adm routes
Route::middleware(['auth'])->group(function() {
    Route::get('/adm', function() { return redirect('/adm/home'); });
    
    Route::get('/adm/home', [HomeC::class, 'getHome'])->name('getHome');
    
    Route::get('/adm/services', [ServicesC::class, 'getServices'])->name('getServices');
    Route::get('/adm/services/{id}', [ServicesC::class, 'getService'])->name('getService');
    Route::get('/adm/newservice', [ServicesC::class, 'newService'])->name('newService');
    Route::get('adm/delservice/{id}', [ServicesC::class, 'delService'])->name('delService');
    Route::post('/updateservice', [ServicesC::class, 'updateService'])->name('updateService');
    Route::post('/adm/addservice', [ServicesC::class, 'addService'])->name('addService');

    Route::get('/adm/contacts', [ContactsC::class, 'getContacts'])->name('getContacts');

    Route::post('/changeposition', [MovePositionC::class, 'changePosition'])->name('changePosition');
});
