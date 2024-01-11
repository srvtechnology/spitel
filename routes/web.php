<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CutomerController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\BirthdayController;
use App\Http\Controllers\Admin\AnniversaryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UtilitesController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\MatrimonyController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsSubCategoryController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\Admin\GlobalController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\FamilyMemberController;
use App\Http\Controllers\Engagement\EngagementController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/optimize', function(){
    Artisan::call('optimize:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    dd("Application optimized successfully");
});

// Route::get('collection-array', function(){
//     $user = \App\Models\User::get();
//     $product = \App\Models\News::get();

//     $data = $product->merge($user);
//     $data = $data->paginate(100);

//     dd($data);
// });

Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::group(['middleware' => 'guest'], function () {
    Route::view('/', 'admin.Auth.login')->name('login');

});

Route::get('/get-state', [GlobalController::class, 'getState'])->name('getState');
Route::get('/get-city', [GlobalController::class, 'getCity'])->name('getCity');

Route::controller(CutomerController::class)->group(function () {
    Route::get('/get-surname',  'getSurname')->name('customer.getSurname');
    Route::get('/get-panth',  'getPanth')->name('customer.getPanth');
    Route::get('/get-patti',  'getPatti')->name('customer.getPatti');
    Route::get('/get-blood_group',  'getBloodGroup')->name('customer.getBloodGroup');
    Route::get('/get-business-category',  'getBusinessCategory')->name('customer.getBusinessCategory');
});

Route::get('/optimize', [ArtisanController::class, 'index']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Customer
    Route::controller(CutomerController::class)->group(function () {
        Route::group(['prefix' => 'customer'], function () {
            Route::get('/',  'index')->name('customer.view');
            Route::get('/add/{id?}',  'form')->name('customer.add');
            Route::post('/create',  'store')->name('customer.store');
            Route::get('/list',  'customer_list')->name('customer.list');
            Route::get('/get-state/{city_id}',  'getStateByCity')->name('customer.getStateByCity');
            Route::get('/view/{id}',  'view')->name('customer.single_view');
            Route::get('/delete/{id}',  'destroy')->name('customer.delete');
            Route::post('/approved',  'approved')->name('customer.approved');
            Route::post('/upload-avtar', 'uploadAvtar')->name('customer.uploadAvtar');
            Route::get('/remove-avtar/{id}', 'removeAvtar')->name('customer.removeAvtar');
            Route::post('/profile-approve', 'profileApprove')->name('customer.profileApprove');
        });
    });

    // Family Member
    Route::group(['prefix' => 'family-member'], function () {
        Route::get('/{customer_id}', [FamilyMemberController::class, 'index'])->name('family_member.view');
        Route::get('/list/show', [FamilyMemberController::class, 'list'])->name('family_member.list');
        Route::get('/add/{customer_id}/{id?}', [FamilyMemberController::class, 'add'])->name('family_member.add');
        Route::post('/store', [FamilyMemberController::class, 'store'])->name('family_member.store');
        Route::get('/view/{id}', [FamilyMemberController::class, 'view'])->name('family_member.single_view');
        Route::get('/get/relationship', [FamilyMemberController::class, 'getRelationShip'])->name('family.getRelationShip');
        Route::get('/delete/member/{id}', [FamilyMemberController::class, 'delete'])->name('family.delete');
    });

    // Post
    Route::group(['prefix' => 'post'], function () {
        Route::get('/', [PostController::class, 'index'])->name('post.view');
        Route::get('/list', [PostController::class, 'list'])->name('post.list');
        Route::get('/add/{id?}', [PostController::class, 'add'])->name('post.add');
        Route::post('/create', [PostController::class, 'create'])->name('post.store');
        Route::get('/view/{id}', [PostController::class, 'view'])->name('post.single_view');
        Route::post('/approved', [PostController::class, 'approved'])->name('post.approved');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
        Route::get('/active-inactive/{id}/{type}', [PostController::class, 'activeInactive']);
    });

    // Manage
    Route::group(['prefix' => 'manage'], function () {

        // State
        Route::group(['prefix' => 'state'], function () {
            Route::get('/', [ManageController::class, 'stateIndex'])->name('manage.state.index');
            Route::get('/list', [ManageController::class, 'stateList'])->name('manage.state.list');
            Route::post('/store', [ManageController::class, 'statestore'])->name('manage.state.store');
        });

        // City
        Route::group(['prefix' => 'city'], function () {
            Route::get('/', [ManageController::class, 'cityIndex'])->name('manage.city.index');
            Route::get('/list', [ManageController::class, 'cityList'])->name('manage.city.list');
            Route::post('/store', [ManageController::class, 'citystore'])->name('manage.city.store');
        });

        // surname
        Route::group(['prefix' => 'surname'], function () {
            Route::get('/', [ManageController::class, 'surnameIndex'])->name('manage.surname.index');
            Route::get('/list', [ManageController::class, 'surnameList'])->name('manage.surname.list');
            Route::post('/store', [ManageController::class, 'storeList'])->name('manage.surname.store');
        });

        // Native place
        Route::group(['prefix' => 'native-place'], function () {
            Route::get('/', [ManageController::class, 'nativePlaceIndex'])->name('manage.native_place.index');
            Route::get('/list', [ManageController::class, 'nativePlaceList'])->name('manage.native_place.list');
            Route::post('/store', [ManageController::class, 'storeNativePlace'])->name('manage.native_place.store');
        });

        // Group
        Route::group(['prefix' => 'group'], function () {
            Route::get('/', [ManageController::class, 'groupIndex'])->name('manage.group.index');
            Route::get('/list', [ManageController::class, 'groupList'])->name('manage.group.list');
            Route::post('/store', [ManageController::class, 'groupStore'])->name('manage.group.store');
        });

        // Blood Group
        Route::group(['prefix' => 'blood-group'], function () {
            Route::get('/', [ManageController::class, 'bloodGroupIndex'])->name('manage.blood_group.index');
            Route::get('/list', [ManageController::class, 'bloodGroupList'])->name('manage.blood_group.list');
            Route::post('/store', [ManageController::class, 'bloodGroupStore'])->name('manage.blood_group.store');
        });

        // Patti
        Route::group(['prefix' => 'patti'], function () {
            Route::get('/', [ManageController::class, 'pattiIndex'])->name('manage.patti.index');
            Route::get('/list', [ManageController::class, 'pattiList'])->name('manage.patti.list');
            Route::post('/store', [ManageController::class, 'pattiStore'])->name('manage.patti.store');
        });

        // Panth
        Route::group(['prefix' => 'panth'], function () {
            Route::get('/', [ManageController::class, 'panthIndex'])->name('manage.panth.index');
            Route::get('/list', [ManageController::class, 'panthList'])->name('manage.panth.list');
            Route::post('/store', [ManageController::class, 'panthStore'])->name('manage.panth.store');
        });

        // Relationship
        Route::group(['prefix' => 'relationship'], function () {
            Route::get('/', [ManageController::class, 'relationshipIndex'])->name('manage.relationship.index');
            Route::get('/list', [ManageController::class, 'relationshipList'])->name('manage.relationship.list');
            Route::post('/store', [ManageController::class, 'relationshipStore'])->name('manage.relationship.store');
        });

        // Business Category
        Route::group(['prefix' => 'business-category'], function () {
            Route::get('/', [ManageController::class, 'businessCategoryIndex'])->name('manage.business_category.index');
            Route::get('/list', [ManageController::class, 'businessCategoryList'])->name('manage.business_category.list');
            Route::post('/store', [ManageController::class, 'businessCategoryStore'])->name('manage.business_category.store');
        });

        // Panth
        Route::group(['prefix' => 'slide'], function () {
            Route::get('/', [ManageController::class, 'slideIndex'])->name('manage.slide.index');
            Route::get('/list', [ManageController::class, 'slideList'])->name('manage.slide.list');
            Route::post('/store', [ManageController::class, 'slideStore'])->name('manage.slide.store');
        });

        // Country
        Route::group(['prefix' => 'country'], function () {
            Route::get('/', [ManageController::class, 'countryIndex'])->name('manage.country.index');
            Route::get('/list', [ManageController::class, 'countryList'])->name('manage.country.list');
            Route::post('/store', [ManageController::class, 'countryStore'])->name('manage.country.store');
        });

        // utilities category
        Route::group(['prefix' => 'utilities-category'], function () {
            Route::get('/', [ManageController::class, 'utilitesCategoryIndex'])->name('manage.utilitesCategory.index');
            Route::get('/list', [ManageController::class, 'utilitesCategoryList'])->name('manage.utilitesCategory.list');
            Route::post('/store', [ManageController::class, 'utilitesCategoryStore'])->name('manage.utilitesCategory.store');
        });

        // utilities sub category
        Route::group(['prefix' => 'utilities-sub-category'], function () {
            Route::get('/', [ManageController::class, 'utilitesSubCategoryIndex'])->name('manage.utilitesSubCategory.index');
            Route::get('/list', [ManageController::class, 'utilitesSubCategoryList'])->name('manage.utilitesSubCategory.list');
            Route::post('/store', [ManageController::class, 'utilitesSubCategoryStore'])->name('manage.utilitesSubCategory.store');
        });

        Route::get('/delete/{type}/{id}', [ManageController::class, 'delete']);
    });


    // Advertisement
    Route::group(['prefix' => 'advertisement'], function () {
        Route::get('/', [AdvertisementController::class, 'index'])->name('advertisement.view');
        Route::get('/add/{id?}', [AdvertisementController::class, 'form'])->name('advertisement.add');
        Route::post('/create', [AdvertisementController::class, 'store'])->name('advertisement.store');
        Route::get('/add-list', [AdvertisementController::class, 'list'])->name('advertisement.list');
        Route::get('/view/{id}', [AdvertisementController::class, 'view'])->name('advertisement.single_view');
        Route::get('/delete/{id}', [AdvertisementController::class, 'delete'])->name('advertisement.delete');
        Route::post('/approved', [AdvertisementController::class, 'approved'])->name('advertisement.approved');
        Route::get('/get-slide', [AdvertisementController::class, 'getSlide'])->name('advertisement.getSlide');
    });

    // Birthday
    Route::group(['prefix' => 'birthday'], function () {
        Route::get('/', [BirthdayController::class, 'index'])->name('birthday.view');
        Route::get('/add/{id?}', [BirthdayController::class, 'form'])->name('birthday.add');
        Route::post('/create', [BirthdayController::class, 'create'])->name('birthday.store');
        Route::get('/list', [BirthdayController::class, 'birthday_list'])->name('birthday.list');
        Route::get('/view/{id}', [BirthdayController::class, 'view'])->name('birthday.single_view');
        Route::get('/delete/{id}', [BirthdayController::class, 'destroy'])->name("birthday.delete");
    });

    // Anniversary
    Route::group(['prefix' => 'anniversary'], function () {
        Route::get('/', [AnniversaryController::class, 'index'])->name('anniversary.view');
        Route::get('/list', [AnniversaryController::class, 'list'])->name('anniversary.list');
        Route::get('/add/{id?}', [AnniversaryController::class, 'add'])->name('anniversary.add');
        Route::post('/create', [AnniversaryController::class, 'store'])->name('anniversary.store');
        Route::get('/view/{id}', [AnniversaryController::class, 'view'])->name('anniversary.single_view');
        Route::get('/delete/{id}', [AnniversaryController::class, 'delete'])->name('anniversary.delete');
        Route::post('/approved', [AnniversaryController::class, 'approved'])->name('anniversary.approved');
    });

    // Engagement
    Route::group(['prefix' => 'engagements', 'as' => 'engagements.'], function () {
        Route::get('/create',[EngagementController::class, 'add'])->name('add');
        Route::post('/create',[EngagementController::class, 'store']);
    });

    // News category
    Route::group(['prefix' => 'news-category'], function () {
        Route::get('/', [NewsCategoryController::class, 'index'])->name('news-category.view');
        Route::get('/add/{id?}', [NewsCategoryController::class, 'add'])->name('news-category.add');
        Route::post('/create', [NewsCategoryController::class, 'store'])->name('news-category.store');
        Route::get('/delete/{id}', [NewsCategoryController::class, 'delete'])->name('news-category.delete');
        Route::get('/list', [NewsCategoryController::class, 'list'])->name('news-category.list');
    });

    // News Sub category
    Route::group(['prefix' => 'news-sub-category'], function () {
        Route::get('/', [NewsSubCategoryController::class, 'index'])->name('news-sub-category.view');
        Route::get('/add/{id?}', [NewsSubCategoryController::class, 'add'])->name('news-sub-category.add');
        Route::post('/create', [NewsSubCategoryController::class, 'store'])->name('news-sub-category.store');
        Route::get('/delete/{id}', [NewsSubCategoryController::class, 'delete'])->name('news-sub-category.delete');
        Route::get('/list', [NewsSubCategoryController::class, 'list'])->name('news-sub-category.list');
    });

    // News
    Route::group(['prefix' => 'news'], function () {
        Route::get('/', [NewsController::class, 'index'])->name('news.view');
        Route::get('/list', [NewsController::class, 'list'])->name('news.list');
        Route::get('/add/{id?}', [NewsController::class, 'add'])->name('news.add');
        Route::post('/store', [NewsController::class, 'store'])->name('news.store');
        Route::get('/view/{id}', [NewsController::class, 'view'])->name('news.single_view');
        Route::get('/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');
        Route::post('/approved', [NewsController::class, 'approved'])->name('news.approved');
    });

    // Utilites
    Route::group(['prefix' => 'utilites'], function () {
        Route::get('/', [UtilitesController::class, 'index'])->name('utilites.view');
        Route::get('/list', [UtilitesController::class, 'utilites_list'])->name('utilites.list');
        Route::get('/add/{id?}', [UtilitesController::class, 'add'])->name('utilites.add');
        Route::post('/store', [UtilitesController::class, 'store'])->name('utilites.store');
        Route::get('/view/{id}', [UtilitesController::class, 'view'])->name('utilites.single_view');
        Route::get('/delete/{id}', [UtilitesController::class, 'delete'])->name('utilites.delete');
        Route::post('/approved', [UtilitesController::class, 'approved'])->name('utilites.approved');
        Route::post('/uploadAvtar', [UtilitesController::class, 'uploadAvtar'])->name('utilites.uploadAvtar');
    });

    // Matrimony
    Route::group(['prefix' => 'matrimony'], function () {
        Route::get('/', [MatrimonyController::class, 'index'])->name('matrimony.view');
        Route::get('/list', [MatrimonyController::class, 'list'])->name('matrimony.list');
        Route::get('/add/{id?}', [MatrimonyController::class, 'add'])->name('matrimony.add');
        Route::post('/store', [MatrimonyController::class, 'store'])->name('matrimony.store');
        Route::get('/view/{id}', [MatrimonyController::class, 'view'])->name('matrimony.single_view');
        Route::get('/delete/{id}', [MatrimonyController::class, 'delete'])->name('matrimony.delete');
        Route::post('/approved', [MatrimonyController::class, 'approved'])->name('matrimony.approved');
    });

    // Videos
    Route::group(['prefix' => 'video'], function () {
        Route::get('/', [VideoController::class, 'index'])->name('video.view');
        Route::get('/list', [VideoController::class, 'list'])->name('video.list');
        Route::get('/add/{id?}', [VideoController::class, 'add'])->name('video.add');
        Route::post('/create', [VideoController::class, 'create'])->name('video.create');
        Route::get('/view/{id}', [VideoController::class, 'view'])->name('video.single_view');
        Route::get('/delete/{id}', [VideoController::class, 'delete'])->name('video.delete');
    });

    // Profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.view');
        Route::get('/list', [ProfileController::class, 'list'])->name('profile.list');
        Route::get('/add/{id?}', [ProfileController::class, 'add'])->name('profile.add');
        Route::post('/create', [ProfileController::class, 'create'])->name('profile.store');
        Route::get('/view/{id}', [ProfileController::class, 'view'])->name('profile.single_view');
        Route::get('/delete/{id}', [ProfileController::class, 'delete'])->name('profile.delete');
        Route::post('/approved', [ProfileController::class, 'approved'])->name('profile.approved');
    });

    // Staff
    Route::group(['prefix' => 'staff'], function () {
        Route::get('/', [StaffController::class, 'index'])->name('staff.view');
        Route::get('/list', [StaffController::class, 'list'])->name('staff.list');
        Route::get('/add/{id?}', [StaffController::class, 'add'])->name('staff.add');
        Route::post('/create', [StaffController::class, 'store'])->name('staff.store');
        Route::get('/view/{id}', [StaffController::class, 'view'])->name('staff.single_view');
        Route::get('/delete/{id}', [StaffController::class, 'delete'])->name('staff.delete');
    });

    Route::group(['prefix' => 'calendar'], function () {
        Route::get('/', [CalendarController::class, 'index'])->name('calendar.list');
        Route::get('/add/{id?}', [CalendarController::class, 'add'])->name('calendar.add');
        Route::post('/add', [CalendarController::class, 'save'])->name('calendar.save');
        Route::get('/edit/{id}', [CalendarController::class, 'edit'])->name('calendar.edit');
        Route::get('/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');
        Route::get('/edit/{id}', [CalendarController::class, 'edit'])->name('calendar.edit');



        Route::post('/saveJainYear', [CalendarController::class, 'saveJainYear'])->name('saveJainYear');
        Route::post('/saveSunrise', [CalendarController::class, 'saveSunrise'])->name('saveSunrise');
        Route::post('/saveMonth', [CalendarController::class, 'saveMonth'])->name('saveMonth');
});
});

Route::get('approve_post/{id}',[PostController::class,'approve_post']);
Route::get('disapprove_post/{id}',[PostController::class,'disapprove_post']);

Route::get('approve_cus/{id}',[CutomerController::class,'approve_cus']);
Route::get('disapprove_cus/{id}',[CutomerController::class,'disapprove_cus']);
