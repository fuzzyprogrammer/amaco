<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PartyController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RFQController;
use App\Http\Controllers\Api\RFQDetailsController;
use App\Http\Controllers\Api\AnalyseController;
use App\Http\Controllers\Api\QuotationController;
use App\Http\Controllers\Api\QuotationDetailController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UserController::class, 'index']);
Route::apiResource('products',ProductController::class);
Route::apiResource('parties',PartyController::class);
Route::apiResource('categories',CategoryController::class);
Route::apiResource('rfq',RFQController::class);
Route::apiResource('rfq-details',RFQDetailsController::class);
Route::apiResource('analyse',AnalyseController::class);
Route::apiResource('analyse',AnalyseController::class);
Route::apiResource('quotation',QuotationController::class);
Route::apiResource('quotation-detail',QuotationDetailController::class);

Route::post('add-user', [UserController::class, 'add'])->name('add.user');
Route::get('parties-vendor',[PartyController::class, 'vendor'])->name('parties.vendor');
Route::get('products-in-category',[CategoryController::class, 'products_in_category'])->name('products.in.category');
