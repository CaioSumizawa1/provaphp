<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('post', [PostController::class,'craetepost']);
route::get('post', [PostController::class, 'indexpost']);
Route::get('post/{id}', [PostController::class, 'showpost']);
route::delete('post/{id}', [PostController::class, 'deletepost']);
route::put('post/{id}', [PostController::class, 'editepost']);

Route::post('post/{id}/comment', [PostController::class,'craetecomment']);
route::get('post/{id}/comment', [PostController::class, 'indecomment']);
Route::get('post/{id}/comment/{fk_postagem_id}', [PostController::class, 'showcomment']);
route::delete('post/{id}/comment{fk_postage_id}', [PostController::class, 'deletecomment']);
route::put('post/{id}/comment{fk_postagem_id]', [PostController::class, 'editecomment']);
