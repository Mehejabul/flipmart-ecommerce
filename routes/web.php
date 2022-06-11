<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\CuponController;
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


Route::group(['prefix' => 'dashboard','middleware' => ['auth']], function() {
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

//Brand Controller
Route::get('/brand',[BrandController::class,'index'])->name('brand.index');
Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
Route::post('/brand',[BrandController::class,'store'])->name('brand.store');
Route::get('/brand/show/{slug}',[BrandController::class,'show'])->name('brand.show');
Route::get('/brand/edit/{slug}',[BrandController::class,'edit'])->name('brand.edit');
Route::put('/brand/{slug}',[BrandController::class,'update'])->name('brand.update');
Route::get('/brand/softdelet/{slug}',[BrandController::class,'softdelet'])->name('brand.softdelet');
Route::delete('/brand/{slug}',[BrandController::class,'delete'])->name('brand.delete');

//Partner controller
Route::get('/partner',[PartnerController::class,'index'])->name('partner.index');
Route::get('/partner/create',[Partnercontroller::class,'create'])->name('partner.create');
Route::post('/partner',[PartnerController::class,'store'])->name('partner.store');
Route::get('/partner/show/{slug}',[PartnerController::class,'show'])->name('partner.show');
Route::get('/partner/edit/{slug}',[PartnerController::class,'edit'])->name('partner.edit');
Route::put('/partner/{slug}',[PartnerController::class,'update'])->name('partner.update');
Route::get('/partner/softdelete/{slug}',[PartnerController::class,'softdelete'])->name('partner.softdelete');
Route::delete('/partner',[PartnerController::class,'delete'])->name('partner.delete');

//product Controller
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/show/{slug}',[ProductController::class, 'show'])->name('product.show');
Route::get('/product/edit/{slug}',[ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{slug}',[ProductController::class, 'update'])->name('product.update');
Route::get('/product/softdelete/{slug}',[ProductController::class, 'softdelete'])->name('product.softdelete');
Route::delete('/product/{slug}',[ProductController::class,'delete'])->name('product.delete');

//Product_category Controller
Route::get('/product/category',[ProductCategoryController::class, 'index'])->name('product.category.index');
Route::get('/product/category/create',[ProductCategoryController::class, 'create'])->name('product.category.create');
Route::post('/product/category',[ProductCategoryController::class, 'store'])->name('product.category.store');
Route::get('/product/category/show/{slug}',[ProductCategoryController::class, 'store'])->name('product.category.show');
Route::get('/product/category/edit/{slug}',[ProductCategoryController::class, 'edit'])->name('product.category.edit');
Route::put('/product/category/{slug}',[ProductCategoryController::class, 'update'])->name('product.category.update');
Route::get('/product/category/softdelete/{slug}',[ProductCategoryController::class, 'softdelete'])->name('product.category.softdelete');
Route::delete('/product/category/{slug}',[ProductCategoryController::class, 'store'])->name('product.category.delete');

//CuponContoller
Route::get('/cupon',[CuponController::class,'index'])->name('cupon.index');
Route::get('/cupon/create',[CuponController::class,'create'])->name('cupon.create');
Route::post('/cupon',[CuponController::class,'store'])->name('cupon.store');
Route::get('/cupon/show/{slug}',[CuponController::class,'show'])->name('cupon.show');
Route::get('/cupon/edit/{slug}',[CuponController::class,'edit'])->name('cupon.edit');
Route::put('/cupon/{slug}',[CuponController::class,'update'])->name('cupon.update');
Route::get('/cupon/softdelete/{slug}',[CuponController::class,'softdelete'])->name('cupon.softdelete');
Route::delete('/cupon/{slug}',[CuponController::class,'delete'])->name('cupon.delete');



















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
