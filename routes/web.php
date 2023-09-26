<?php

use App\Http\Controllers\firebase\firebaseController;
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
Route::get('/contact', [firebaseController::class,'index'])->name('contact');
Route::get('/add-contact', [firebaseController::class,'create'])->name('add-contact');
Route::post('/contact', [firebaseController::class,'store'])->name('contact.store');
Route::get('/edit-contact/{id}', [firebaseController::class,'edit'])->name('contact.edit');
Route::post('/update-contact/{id}', [firebaseController::class,'update'])->name('contact.update');
Route::get('/delete-contact/{id}', [firebaseController::class,'delete'])->name('contact.delete');
Route::get('/', function () {
    return view('welcome');
});
