<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\frontend\HomePageController;
use App\Http\Controllers\frontend\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\ProductController;

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

Route::group(['middleware'=>'categories'],function (){

//homepage
    Route::get('/',[PageController::class,'homePage'])->name('homepage');



//products
    Route::get('/product/{slug?}/',[ProductController::class,'Products'])->name('products');
    Route::get('/categories',[PageController::class,'categoriesPage'])->name('categories');


//product detail
    Route::get('/product-detail/{id}/{slug}',[ProductController::class,'productDetail'])->name('product-detail');



//about
    Route::get('/hakkimizda',[PageController::class,'about'])->name('about');



//contact
    Route::get('/iletisim',[PageController::class,'contact'])->name('contact');
    Route::post('/iletisim/kaydet',[ContactController::class,'saveContact'])->name('save-contact');



//card
    Route::get('/card',[PageController::class,'cart'])->name('cart');


});




require __DIR__.'/auth.php';
