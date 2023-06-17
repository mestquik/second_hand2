<?php

use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\LogoController;


Route::group(['prefix' => 'panel',  'middleware' => 'auth','sitelogo'], function()
{

    Route::get('/',[DashboardController::class,'index'])->name('panel');

    //SLİDER YÖNETİMİ
    Route::get('/slider',[SliderController::class,'index'])->name('slider.index');
    Route::get('/slider/ekle',[SliderController::class,'create'])->name('slider.create');
    Route::post('/slider/ekle',[SliderController::class,'store'])->name('slider.store');

    Route::get('/slider/{id}/duzenle',[SliderController::class,'edit'])->name('slider.edit');
    Route::post('/slider/{id}/guncelle',[SliderController::class,'update'])->name('slider.update');
    Route::put('/slider/statu/guncelle',[SliderController::class,'updateStatu'])->name('slider.status.update');

    Route::delete('/slider/{id}/delete',[SliderController::class,'destroy'])->name('slider.destroy');
    //----SLİDER-BİTİŞ----\\



    //ÜRÜN YÖNETİMİ
    Route::get('/urun',[ProductController::class,'index'])->name('product.index');
    Route::get('/urun/ekle',[ProductController::class,'create'])->name('product.create');
    Route::post('/urun/ekle/{categoryID}',[ProductController::class,'subCat'])->name('product.subCat');
    Route::post('/urun/ekle',[ProductController::class,'store'])->name('product.store');

    Route::get('/urun/{id}/duzenle',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/urun/{id}/guncelle',[ProductController::class,'update'])->name('product.update');

    Route::put('/urun/statu/guncelle',[ProductController::class,'updateStatu'])->name('product.status.update');

    Route::get('/urun/listele',[ProductController::class,'subCat'])->name('product.subcat');


    Route::delete('/urun/{id}/delete',[ProductController::class,'destroy'])->name('product.destroy');


    //----ÜRÜN-BİTİŞ----\\


    //KATEGORİ YÖNETİMİ
    Route::get('/kategori',[CategoryController::class,'categoryIndex'])->name('category.index');
    Route::get('/kategori/ekle',[CategoryController::class,'categoryCreate'])->name('category.create');
    Route::post('/kategori/ekle',[CategoryController::class,'categoryStore'])->name('category.store');

    Route::get('/kategori/{id}/duzenle',[CategoryController::class,'categoryEdit'])->name('category.edit');
    Route::post('/kategori/{id}/guncelle',[CategoryController::class,'categoryUpdate'])->name('category.update');

    Route::get('/altkategori',[SubCategoryController::class, 'subcategoryIndex'])->name('subcategory.index');
    Route::get('/altkategori/ekle',[SubCategoryController::class,'subcategoryCreate'])->name('subcategory.create');
    Route::post('/altkategori/ekle',[SubCategoryController::class,'subcategoryStore'])->name('subcategory.store');
    Route::get('/altkategori/{id}/duzenle',[SubCategoryController::class,'subcategoryEdit'])->name('subcategory.edit');
    Route::post('/altkategori/{id}/guncelle',[SubCategoryController::class,'subcategoryUpdate'])->name('subcategory.update');



    Route::put('/kategori/statu/guncelle',[CategoryController::class,'updateStatu'])->name('category.statu.update');


    Route::delete('/kategori/{id}/sil',[CategoryController::class,'destroy'])->name('category.destroy');


    //----KATEGORİ-BİTİŞ----\\


    //KULLANICI YÖNETİMİ


    Route::get('/kullanici',[UserController::class,'index'])->name('user.index');
    Route::get('/kullanici/ekle',[UserController::class,'userCreate'])->name('user.create');
    Route::post('/kullanici/ekle',[UserController::class,'userStore'])->name('user.store');
//
    Route::get('/kullanici/{id}/duzenle',[UserController::class,'userEdit'])->name('user.edit');
    Route::post('/kullanici/{id}/guncelle',[UserController::class,'userUpdate'])->name('user.update');

    Route::get('/kullanici/{id}/urun',[UserController::class,'userProducts'])->name('user.products');
//
//
//
    Route::put('/kullanici/statu/guncelle',[UserController::class,'updateStatu'])->name('user.statu.update');
//
//
    Route::delete('/kullanici/{id}/sil',[UserController::class,'userDestroy'])->name('user.destroy');



    //----KULLANICI-BİTİŞ----\\


    //LOGO YÖNETİMİ

    Route::get('/logo',[LogoController::class,'index'])->name('logo.index');
    Route::get('/logo/ekle',[LogoController::class,'logoCreate'])->name('logo.create');
    Route::post('/logo/ekle',[LogoController::class,'logoStore'])->name('logo.store');
//
    Route::get('/logo/{id}/duzenle',[LogoController::class,'logoEdit'])->name('logo.edit');
    Route::post('/logo/{id}/guncelle',[LogoController::class,'logoUpdate'])->name('logo.update');

//
//
    Route::put('/logo/statu/guncelle',[LogoController::class,'logoUpdateStatu'])->name('logo.statu.update');
//
//
    Route::delete('/logo/{id}/sil',[LogoController::class,'logoDestroy'])->name('logo.destroy');


    //----LOGO-BİTİŞ----\\




});



require __DIR__.'/auth.php';
