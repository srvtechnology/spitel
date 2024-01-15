<?php

use App\Http\Controllers\Api\UserControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LandingPageController;
use App\Http\Controllers\Api\Customer\MobileApiController;

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

Route::post('get-sub-categories', [LandingPageController::class, 'getMerchantCategories']);
Route::post('check-mrref-code', [LandingPageController::class, 'checkMrRefCode']);
Route::post('save-merchant-info', [LandingPageController::class, 'saveMerchant']);
Route::post('save-representative-info', [LandingPageController::class, 'saveRepresentative']);

Route::post('merchant-login', [UserControler::class, "merchantLogin"]);
Route::post('customer-login', [MobileApiController::class, "customerLogin"]);

Route::middleware('auth:api')->group(function () {
    Route::get('customer-detail', [MobileApiController::class, "customerDetail"]);
    Route::get('dashboard', [MobileApiController::class, "dashboard"]);
    Route::post('bussiness-product-category', [MobileApiController::class, "productCatergory"]);
    Route::post('all-merchant', [MobileApiController::class, "allMerchant"]);
    Route::post('discounted-merchant', [MobileApiController::class, "discountedMerchant"]);
    Route::post('near-by-merchant', [MobileApiController::class, "nearByMerchant"]);
    Route::post('top-rated-merchant', [MobileApiController::class, "topRatedMerchant"]);
    Route::post('dashboard-filter', [MobileApiController::class, "dashboardFilter"]);
});
