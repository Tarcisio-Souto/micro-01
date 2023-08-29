<?php

use App\Http\Controllers\Api\{
    CategoryController,
    CompanyController
};
use Illuminate\Support\Facades\Route;

Route::apiResource('companies', CompanyController::class);
Route::apiResource('categories', CategoryController::class);

/*Route::group(['middleware' => 'api'], function () {
    Route::apiResource('categories', CategoryController::class);
});*/


