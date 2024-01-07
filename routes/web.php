<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
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
Route::get('/delete/{id}',[DocumentController::class,'delete'])->name('delete_file');
Route::get('/delete_admin/{id}',[DocumentController::class,'delete_admin'])->name('delete_admin');
Route::get('/list_file',[DocumentController::class,'show'])->name("list_file");


Route::get('/admin_index',[UserController::class,'admin_index'])->name("admin_index");
Route::get('/admin',[UserController::class,'makeAdmin'])->name("makeAdmin");
Route::get('/login_form',[UserController::class,'login_index'])->name("login_form");
Route::post('/logout',[UserController::class,'logout'])->name("logout");
Route::get('/register_form',[UserController::class,'register_index'])->name("register_form");
Route::post('/login',[UserController::class,'login'])->name("login");
Route::post('/register',[UserController::class,'store'])->name("submit");


