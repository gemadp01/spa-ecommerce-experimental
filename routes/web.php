<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('coba', function () {
//     return Inertia::render('Index', [
//         'name' => "Gema"
//     ]);
// });


Route::controller(\App\Http\Controllers\ProductController::class)->group(function() {
    Route::get('/product',  'index_product')->name('index_product');

    Route::get('/product/create',  'create_product')->name('create_product');
    Route::post('/product/create',  'store_product')->name('store_product');
    Route::get('/product/{product}',  'show_product')->name('show_product');
    Route::get('/product/{product}/edit',  'edit_product')->name('edit_product');
    Route::patch('/product/{product}/update',  'update_product')->name('update_product');
    Route::delete('/product/{product}',  'delete_product')->name('delete_product');

});
