<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassificadoController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\ImageController;


Route::get('/401',[AuthController::class,'unauthorized'])->name('login');

Route::post('/auth/login',[AuthController::class,'login']);
Route::post('auth/register',[AuthController::class,'register']);


Route::post('/auth/validate', [AuthController::class,'validateToken']);
Route::post('/auth/logout'  ,  [AuthController::class,'logout']);


Route::get('/classificados',[ClassificadoController::class, 'List']);
Route::get('/classificados/{id}',[ClassificadoController::class, 'ListById']);
Route::get('/classificados/{id}/user',[ClassificadoController::class, 'ListCatForUser']);
Route::Post('/classificados/create',[ClassificadoController::class, 'Create']);
Route::put('/classificados/edit/{id}',[ClassificadoController::class, 'Edit']);
Route::put('/classificados/status/{id}',[ClassificadoController::class, 'StatusUpdate']);
Route::delete('/classificados/delete/{id}',[ClassificadoController::class, 'Delete']);

Route::get('/photo',[ImageController::class, 'index']);
Route::post('/photo',[ImageController::class, 'save']);

/*
Route::get('/view',[ClassificadoController::class, 'viewClassifiled']);
Route::get('/home',[ClassificadoController::class, 'homeClassifield']);
*/



Route::get('/categoria',[CategoriaController::class, 'List']);
Route::get('/categoria/{id}',[CategoriaController::class, 'ListById']);
Route::Post('/categoria/create',[CategoriaController::class, 'Create']);
Route::put('/categoria/edit/{id}',[CategoriaController::class, 'Edit']);
Route::delete('/categoria/delete/{id}',[CategoriaController::class, 'Delete']);


Route::get('/local',[LocalController::class, 'List']);
Route::get('/local/{id}',[LocalController::class, 'ListById']);
Route::Post('/local/create',[LocalController::class, 'Create']);
Route::put('/local/edit/{id}',[LocalController::class, 'Edit']);
Route::delete('/local/delete/{id}',[LocalController::class, 'Delete']);


Route::get('/post',[ArtigosController::class, 'List']);
Route::get('/post/{id}',[ArtigosController::class, 'ListById']);
Route::Post('/post/create',[ArtigosController::class, 'Create']);
Route::put('/post/edit/{id}',[ArtigosController::class, 'Edit']);
Route::delete('/post/delete/{id}',[ArtigosController::class, 'Delete']);



Route::middleware('auth:api')->group(function(){
    Route::get('/post',function(){
        return "AQUI e proibido";
    });
});


