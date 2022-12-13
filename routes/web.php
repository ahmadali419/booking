<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemMenuController;
use App\Http\Controllers\PostalCodeController;
use App\Http\Controllers\TimeSlotController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('front');

Route::prefix('potalcodes')->name('postalcode.')->group(function () {
    Route::get('/list', [PostalCodeController::class, 'index'])->name('list');
    Route::post('/submit', [PostalCodeController::class, 'store'])->name('store');
    Route::post('/delete', [PostalCodeController::class, 'destroy'])->name('delete');
    // Route::get('/child-categories', 'CategoryController@childCategories')->name('child-categories');
});
Route::prefix('items')->name('item.')->group(function () {
    Route::get('/list', [ItemController::class, 'index'])->name('list');
    Route::post('/submit', [ItemController::class, 'store'])->name('store');
    Route::post('/delete', [ItemController::class, 'destroy'])->name('delete');
    // Route::get('/child-categories', 'CategoryController@childCategories')->name('child-categories');
});
Route::post('/validate-code', [HomeController::class, 'validateCode'])->name('validate-code');
Route::prefix('item-meuns')->name('item-menu.')->group(function () {
    Route::get('/list', [ItemMenuController::class, 'index'])->name('list');
    Route::post('/submit', [ItemMenuController::class, 'store'])->name('store');
    Route::post('/delete', [ItemMenuController::class, 'destroy'])->name('delete');
    // Route::get('/child-categories', 'CategoryController@childCategories')->name('child-categories');
});
Route::prefix('time-slots')->name('time-slot.')->group(function () {
    Route::get('/list', [TimeSlotController::class, 'index'])->name('list');
    Route::get('/create', [TimeSlotController::class, 'create'])->name('create');
    Route::post('/submit', [TimeSlotController::class, 'store'])->name('store');
    // Route::post('/delete', [TimeSlotController::class, 'destroy'])->name('delete');
// Route::get('/child-categories', 'CategoryController@childCategories')->name('child-categories');
});
Route::prefix('services')->name('service.')->group(function () {
    Route::get('/list', function(){
        return view('services.list');
    })->name('list');
 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/service-items/{id}', [App\Http\Controllers\HomeController::class, 'serviceItems'])->name('service-items');
Route::get('get-time-slots', [App\Http\Controllers\HomeController::class, 'getTimeSlots'])->name('getTimeSlots');
Route::get('set-item-in-sessino', [App\Http\Controllers\HomeController::class, 'setItemInSession'])->name('setSession');
