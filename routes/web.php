<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[DocumentController::class,'index'])->name('home');
Route::get('/form',[DocumentController::class,'form'])->name('form');
Route::get('/download/{id}', [DocumentController::class,'download'])->name('download');
Route::post('/upload',[DocumentController::class,'store'])->name('upload_file');

;
