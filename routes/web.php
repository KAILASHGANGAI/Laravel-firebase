<?php

use App\Http\Controllers\firebase\firebaseController;
use App\Http\Controllers\firebase\LoginController;
use App\Http\Controllers\firebase\UserController;
use App\Http\Controllers\FirebaseNotificationController;
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
Route::view('/register','firebase.user.register')->name('view.register');
Route::post('register',[UserController::class,'register'])->name('register');
Route::post('login',[LoginController::class,'login'])->name('login');
Route::view('/login','firebase.user.login')->name('view.login');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['roleGuard:admin','auth']],function(){
    Route::get('/contact', [firebaseController::class,'index'])->name('contact');
    Route::get('/add-contact', [firebaseController::class,'create'])->name('add-contact');
    Route::post('/contact', [firebaseController::class,'store'])->name('contact.store');
    Route::get('/edit-contact/{id}', [firebaseController::class,'edit'])->name('contact.edit');
    Route::post('/update-contact/{id}', [firebaseController::class,'update'])->name('contact.update');
    Route::get('/delete-contact/{id}', [firebaseController::class,'delete'])->name('contact.delete');
    
    Route::view('/send-notification','firebase.message.sendmessage')->name('notification.show');
    Route::post('/store-token', [FirebaseNotificationController::class, 'updateDeviceToken'])->name('store.token');

    Route::post('/send-notification',[FirebaseNotificationController::class,'sendNotification'])->name('notification.send');
});