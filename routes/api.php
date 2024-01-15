<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{
	CustomerController,
	FamilyMemberController,
	BirthDayController,
	AnniversaryController,
	MatrimonyController,
	NewsController,
	AdvertisementController,
	UtilitiesController,
	VideosController,
	ManageController,
	CalendarController,
    PostController,
    ExpiryController,
    PostLikeController

};
use App\Http\Controllers\Engagement\EngagementController;

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

Route::group(['middleware' => 'auth:sanctum'], function () {
	Route::get('/user', function (Request $request) {
		return $request->user();
	});

	Route::group(['prefix' => 'customer'], function () {
		Route::post('/upload-avtar', [CustomerController::class, 'uploadAvtar']);
		Route::post('/edit', [CustomerController::class, 'register']);
		Route::get('/view/{id}', [CustomerController::class, 'view']);
	});

	Route::group(['prefix' => 'family_member'], function () {
		Route::get('/', [FamilyMemberController::class, 'index']);
		Route::post('/create', [FamilyMemberController::class, 'store']);
		Route::get('/delete/{id}', [FamilyMemberController::class, 'delete']);
	});

    Route::group(['prefix' => 'post'], function () {
        Route::get('/delete/{id}', [PostController::class, 'delete']);

    });

});

Route::group(['prefix' => 'birthday'], function () {
	Route::get('/', [BirthDayController::class, 'index']);
});

Route::group(['prefix' => 'anniversary'], function () {
	Route::get('/', [AnniversaryController::class, 'index']);
});

Route::group(['prefix' => 'engagements', 'as' => 'engagements.'], function () {
	Route::get('/', [EngagementController::class, 'index']);
});

Route::group(['prefix' => 'matrimony'], function () {
	Route::post('/store', [MatrimonyController::class, 'store']);
	Route::get('/', [MatrimonyController::class, 'index']);
    Route::get('/listbyid', [MatrimonyController::class, 'listbyid']);

});

Route::group(['prefix' => 'news'], function () {
	Route::get('/', [NewsController::class, 'index']);
	Route::get('/category', [NewsController::class, 'category']);
	Route::get('/sub-category', [NewsController::class, 'sub_category']);
});

Route::group(['prefix' => 'advertisement'], function () {
	Route::get('/', [AdvertisementController::class, 'index']);
});

Route::group(['prefix' => 'utilities'], function () {
	Route::get('/', [UtilitiesController::class, 'index']);
});

Route::group(['prefix' => 'post'], function () {
    Route::post('/', [PostController::class, 'store']);
    Route::get('/get-data', [PostController::class, 'list']);
    Route::get('/likes-list', [PostLikeController::class, 'list']);
    Route::post('/post-like', [PostLikeController::class, 'store']);

});


Route::group(['prefix' => 'video'], function () {
	Route::get('/', [VideosController::class, 'index']);
});

Route::get('/get-add-slide', [AdvertisementController::class, 'getSLide']);
Route::get('/get-state', [CustomerController::class, 'getState']);
Route::get('/get-cities', [CustomerController::class, 'getCity']);
Route::post('/get-cities-of-state', [CustomerController::class, 'allCitiesOfState']);
Route::post('/customer-register', [CustomerController::class, 'register']);
Route::post('/send-otp', [CustomerController::class, 'otpRequest']);
Route::post('/verify-otp', [CustomerController::class, 'verifyOtp']);
Route::post('/upload-image', [CustomerController::class, 'uploadImage']);

Route::controller(ManageController::class)->group(function () {
	Route::get('/get-surname',  'getSurname');
	Route::get('/get-panth',  'getPanth');
	Route::get('/get-patti',  'getPatti');
	Route::get('/get-blood_group',  'getBloodGroup');
	Route::get('/get-business-category',  'getBusinessCategory');
	Route::get('/get-relationship',  'getRelationship');
	Route::get('/get-utilities-category',  'getUtilitiesCategory');
	Route::get('/get-utilities-sub-category',  'getUtilitiesSubCategory');
	Route::get('/get-group', 'getGroup');
});

Route::get('/get-calendar-event', [CalendarController::class, 'getCalendar']);
Route::get('/get-expiry', [ExpiryController::class, 'getExpiry']);
Route::get('/get-customer', [CustomerController::class, 'getCustomer']);
Route::get('/get-customer-all', [CustomerController::class, 'getAllCustomer']);
//Route::get('/get-customer/{id}', [CustomerController::class, 'getCustomer']);

