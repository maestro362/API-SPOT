<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('login', [ApiController::class, 'authenticate']);
// Route::post('register', [ApiController::class, 'register']);
Route::group(['middleware' => ['jwt.verify']], function() {
    // Route::get('logout', [ApiController::class, 'logout']);
    Route::get('/price-m2/zip-codes/{zip_code}/aggregate/{type}?construction_type={construction_type}', [ConstructionController::class, 'GetInfo']);
  
});
