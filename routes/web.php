<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/index', [ContactController::class, 'store']);
Route::get('/contact/create', [ContactController::class, 'create']);
Route::get('/contact/show/{id}', [ContactController::class, 'show']);
Route::delete('/contact/destroy/{id}', [ContactController::class, 'destroy']);
Route::get('/contact/edit/{id}', [ContactController::class, 'edit']);
Route::post('/contact/update/{id}', [ContactController::class, 'update']);
// Route::get('/show', function () {
//     return view('contacts.show');
// });
// Route::get('/edit', function () {
//     return view('contacts.edit');
// });
// Route::get('/delete', function () {
//     return view('contacts.destroy');
// });
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/contact', ContactController::class);