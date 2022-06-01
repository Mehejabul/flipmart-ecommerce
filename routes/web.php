<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ManageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//websiteController

Route::get('/',[WebsiteController::class,'index'])->name('website.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {
    Route::get('/',[AdminController::class, 'index']);

    // User controller

Route::get('/user',[UserController::class, 'index'])->name('user.index');
Route::get('/user/create',[UserController::class, 'create'])->name('user.create');
Route::post('/user',[UserController::class,'store'])->name('user.store');
Route::get('/user/show/{slug}',[UserController::class,'show'])->name('user.show');
Route::get('/user/edit/{slug}',[UserController::class,'edit'])->name('user.edit');
Route::put('/user/{slug}',[UserController::class,'update'])->name('user.update');
Route::get('/user/softdel/{slug}',[UserController::class,'softdel'])->name('user.softdel');
Route::delete('/user/{slug}',[UserController::class,'delete'])->name('user.delete');

    //Baneer Controller
Route::get('/banner',[BannerController::class,'index'])->name('banner.index');
Route::get('/banner/create',[BannerController::class,'create'])->name('banner.create');
Route::post('/banner',[BannerController::class,'store'])->name('banner.store');
Route::get('/banner/show/{slug}',[BannerController::class,'show'])->name('banner.show');
Route::get('/banner/edit/{slug}',[BannerController::class,'edit'])->name('banner.edit');
Route::put('/banner/{slug}',[BannerController::class,'update'])->name('banner.update');
Route::get('/banner/softdel/{slug}',[BannerController::class,'softdel'])->name('banner.softdel');
Route::delete('/banner/{slug}',[BannerController::class,'delete'])->name('banner.delete');








});

// Basic setting route list
Route::get('/basic-setting',[ManageController::class,'basic_index'])->name('manage.basic.index');
Route::post('/basic-setting',[ManageController::class,'basic_update'])->name('manage.basic.upate');

//Contact Info Route list
Route::get('/contact-info',[ManageController::class,'contact_index'])->name('manage.contact.index');
Route::post('/contact-info',[ManageController::class,'contact_update'])->name('manage.contact.upate');

//Social Info Route List
Route::get('/social-info',[ManageController::class,'social_index'])->name('manage.social.index');
Route::post('/social-info',[ManageController::class,'social_update'])->name('manage.social.upate');
require __DIR__.'/auth.php';
