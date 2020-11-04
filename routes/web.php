<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ComponentsController;

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
});
define('PAGINATION_COUNT',5);
define('sections_path','/images/sections/');
    ######################### Begin Sections Routes ########################
Route::prefix('sections')->name('sections.')->group(function(){
	  Route::get('index'     ,[SectionsController::class, 'index'])->name('index');
	  Route::get('create'    ,[SectionsController::class, 'create'])->name('create');
	  Route::post('store'    ,[SectionsController::class, 'store'])->name('store');
	  Route::get('{id}/edit' ,[SectionsController::class, 'edit'])->name('edit');
	  Route::post('{id}/update',[SectionsController::class, 'update'])->name('update');
	  Route::post('destroy/{id}'  ,[SectionsController::class, 'destroy'])->name('destroy');

});

    ######################### End Sections Routes ########################

    ######################### Begin Components Routes ########################
Route::prefix('components')->name('components.')->group(function(){
	  Route::get('index'     ,[ComponentsController::class, 'index'])->name('index');
	  Route::get('create'    ,[ComponentsController::class, 'create'])->name('create');
	  Route::post('store'    ,[ComponentsController::class, 'store'])->name('store');
	  Route::get('{id}/edit' ,[ComponentsController::class, 'edit'])->name('edit');
	  Route::post('{id}/update',[ComponentsController::class, 'update'])->name('update');
	  Route::post('destroy/{id}'  ,[ComponentsController::class, 'destroy'])->name('destroy');

});

    ######################### End Components Routes ########################
