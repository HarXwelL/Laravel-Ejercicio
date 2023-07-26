<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentSingleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(DocumentController::class)->group(function(){
    Route::get('/Documents-types','view_type')->name('type');
    Route::get('/Documents-types/create','create_type')->name('createtype');
    Route::post('/Documents-types', 'store_type')->name('docs.store_type');
    Route::get('/Documents-types/{tipo}/edit','edit_type')->name('docs.edit_type');
    Route::put('/Documents-types/{tipo}','update_type')->name('update_type');
    Route::delete('/Documents-types/{tipo}', 'delete_type')->name('docs.delete_type');
    Route::get('/Documents/{tipo}','view_doc')->name('document');
});

Route::controller(DocumentSingleController::class)->group(function(){
    Route::get('/Documents/create','create_doc')->name('create_doc');
    Route::post('/Documents', 'store_doc')->name('docs.store_doc');
    Route::get('/Documents/{tipo}/edit','edit_doc')->name('docs.edit_doc');
    Route::put('/Documents/{tipo}','update_doc')->name('update_doc');
    Route::delete('/Documents/{tipo}', 'delete_doc')->name('docs.delete_doc');
});