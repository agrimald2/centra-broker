<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UtilitiesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function () {

});
Route::get('/customer_types', [UtilitiesController::class, 'getCustomerTypes']);
Route::get('/document_types', [UtilitiesController::class, 'getDocumentTypes']);
Route::get('/customer', [UtilitiesController::class, 'getCustomers']);