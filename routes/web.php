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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [App\Http\Controllers\PagesController::class,'index'])->name('');

Route::prefix('admin')->group(function(){
    
    Route::get('/layout', [App\Http\Controllers\PagesController::class,'layout'])->name('admin.layout');

    Route::get('/main', [App\Http\Controllers\MainPagesController::class,'index'])->name('admin.main');

    Route::get('/icon', [App\Http\Controllers\IconPagesController::class,'index'])->name('admin.icon');

    Route::put('/main', [App\Http\Controllers\MainPagesController::class,'update'])->name('admin.main.update');

    Route::put('/icon', [App\Http\Controllers\IconPagesController::class,'update'])->name('admin.icon.update');

    Route::get('/projects/create', [App\Http\Controllers\ProjectPagesController::class,'create'])->name('admin.projects.create');

    Route::post('/projects/store', [App\Http\Controllers\ProjectPagesController::class,'store'])->name('admin.projects.store');

    Route::get('/projects/list', [App\Http\Controllers\ProjectPagesController::class,'list'])->name('admin.projects.list');

    Route::get('/projects/edit/{id}', [App\Http\Controllers\ProjectPagesController::class,'edit'])->name('admin.projects.edit');

    Route::post('/projects/update/{id}', [App\Http\Controllers\ProjectPagesController::class,'update'])->name('admin.projects.update');

    Route::delete('/projects/destroy/{id}', [App\Http\Controllers\ProjectPagesController::class,'destroy'])->name('admin.projects.destroy');

    Route::get('/protfolios/create', [App\Http\Controllers\ProtfolioPagesController::class,'create'])->name('admin.protfolios.create');

    Route::put('/protfolios/store', [App\Http\Controllers\ProtfolioPagesController::class,'store'])->name('admin.protfolios.store');

    Route::get('protfolios/list', [App\Http\Controllers\ProtfolioPagesController::class,'list'])->name('admin.protfolios.list');

    Route::get('/protfolios/edit/{id}', [App\Http\Controllers\ProtfolioPagesController::class,'edit'])->name('admin.protfolios.edit');

    Route::post('/protfolios/update/{id}', [App\Http\Controllers\ProtfolioPagesController::class,'update'])->name('admin.protfolios.update');

    Route::delete('/protfolios/destroy/{id}', [App\Http\Controllers\ProtfolioPagesController::class,'destroy'])->name('admin.protfolios.destroy');

    Route::get('/abouts/create', [App\Http\Controllers\AboutPagesController::class,'create'])->name('admin.abouts.create');

    Route::put('/abouts/store', [App\Http\Controllers\AboutPagesController::class,'store'])->name('admin.abouts.store');

    Route::get('abouts/list', [App\Http\Controllers\AboutPagesController::class,'list'])->name('admin.abouts.list');

    Route::get('/abouts/edit/{id}', [App\Http\Controllers\AboutPagesController::class,'edit'])->name('admin.abouts.edit');

    Route::post('/abouts/update/{id}', [App\Http\Controllers\AboutPagesController::class,'update'])->name('admin.abouts.update');

    Route::delete('/abouts/destroy/{id}', [App\Http\Controllers\AboutPagesController::class,'destroy'])->name('admin.abouts.destroy');
});

Route::post('/contact', [App\Http\Controllers\ContactController::class,'store'])->name('contact.store');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



