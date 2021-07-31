<?php

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

Route::group(['as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::group(['prefix' => 'image', 'as' => 'image.'], function () {
        Route::get('/fetch', [\App\Http\Controllers\Admin\FileUploadController::class, 'fetchGallery'])->name('gallery.fetch');
        Route::post('/upload', [\App\Http\Controllers\Admin\FileUploadController::class, 'storeGallery'])->name('gallery.upload');
        Route::delete('/delete', [\App\Http\Controllers\Admin\FileUploadController::class, 'removeGallery'])->name('gallery.upload');
    });
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/addon', \App\Http\Controllers\Admin\AddonController::class)->except('show');
    Route::resource('/category', \App\Http\Controllers\Admin\CategoryController::class)->except('show');
    Route::resource('/brand', \App\Http\Controllers\Admin\BrandController::class)->except('show');
    Route::get('/smart_assistant/{id}/models', [\App\Http\Controllers\Admin\SmartAssistantController::class, 'models']);
    Route::resource('/smart_assistant', \App\Http\Controllers\Admin\SmartAssistantController::class)->except('show');
    Route::get('/attribute', [\App\Http\Controllers\Admin\Attributes\AttributeController::class, 'index'])->name('attribute.index');
    Route::resource('/make', \App\Http\Controllers\Admin\Attributes\MakeController::class)->except('show');
    Route::resource('/model', \App\Http\Controllers\Admin\Attributes\ModelController::class)->except('show');
    Route::resource('/year', \App\Http\Controllers\Admin\Attributes\YearController::class)->except('show');
    Route::resource('/mileage', \App\Http\Controllers\Admin\Attributes\MileageController::class)->except('show');
    Route::resource('/color', \App\Http\Controllers\Admin\Attributes\ColorController::class)->except('show');
    Route::resource('/coupon', \App\Http\Controllers\Admin\CouponController::class)->except('show');
    Route::resource('/page', \App\Http\Controllers\Admin\PageController::class)->except('show');
    Route::resource('/customer', \App\Http\Controllers\Admin\UserController::class)->except('show');
    Route::resource('/admin', \App\Http\Controllers\Admin\AdminController::class)->except('show');
    Route::post('/admin/name_check', [ \App\Http\Controllers\Admin\AdminController::class, 'nameCheck'])->name('name.check');
});
