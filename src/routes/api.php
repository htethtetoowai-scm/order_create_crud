<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\SubCategoryController;

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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('saveOrder', [OrderController::class, 'saveOrder']);
    Route::get('items', [ItemController::class, 'index']);
    Route::get('item/detail/{id}', [ItemController::class, 'detail']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category/detail/{id}', [CategoryController::class, 'detail']);
    Route::get('subCategories', [SubCategoryController::class, 'index']);
    Route::get('subCategory/detail/{id}', [SubCategoryController::class, 'detail']);
});
