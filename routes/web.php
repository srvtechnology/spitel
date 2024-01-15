<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Merchant\MerchantController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BusinessProductCategoryController;
use App\Http\Controllers\Admin\AdminRepresentativeController;
use App\Http\Controllers\Representative\RepresentativeController;
use App\Http\Controllers\Admin\SignupRequestsController;

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

Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLocale');



Route::get('/', function () {
    return view('web.index');
});
Route::get('/privacy', function () {
    return view('web.terms');
});
Route::get('/change', [LanguageController::class, 'change'])->name('changeLang');

// // admin dashboard
// Route::get('/admin/dashboard', function () {
//     return view('web.admins.dashboard');
// });


// admin Routes

Route::get('/admin', function () {
    return view('web.admins.auth.login');
})->name("adminlogin");

Route::get('/admin/reset-password', function () {
    return view('web.admins.auth.reset_password');
});

Route::post('admin-login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::post('password-reset', [AdminController::class, 'passwordReset'])->name('password.reset');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('web.admins.dashboard');
    })->name('admin.dashboard');

    Route::get('admin-logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    Route::group(['controller' => BusinessProductCategoryController::class], function(){
        Route::get('/admin/store-categories/list', 'index')->name('merchant.index');
        Route::get('/admin/store-categories/food-categories', 'foodCategories')->name('merchant.foodList');
        Route::post('/admin/store-categories/store', 'store')->name('admin.merchant.store');
        Route::get('/admin/store-categories/edit/{id}', 'merchantEdit')->name('merchant.edit');
        Route::post('/admin/store-categories/update/{id}', 'update')->name('merchant.update');
        Route::post('/admin/store-categories/delete/{id}', 'delete')->name('merchant.delete');
        Route::get('/admin/other-categories/list', 'otherCategory')->name('merchant.index');
        Route::post('/admin/store-categories/chnage-status/', 'changetatus');
    });

    Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'controller' => SignupRequestsController::class], function(){
        Route::get('signup-requests/merchant/list', 'merchantSignupRequestsList')->name('merchant-signup-requests');
        Route::get('signup-request/merchant/view/{id}', 'merchantSignupRequestView')->name('merchant-signup-request-view');
        Route::get('signup-requests/representative/list', 'representativeSignupRequestsList')->name('representative-signup-requests');
    });

    
    Route::get('/admin/representative-request/view', function () {
        return view('web.admins.requests.representative_request_detail');
    });
    Route::get('/admin/representative-request/list', function () {
        return view('web.admins.requests.representative_request_index');
    });



    Route::get('admin/store-categories/add', function () {
        return view('web.admins.store-categories.store_categories_add');
    });
    Route::get('/admin/other-categories/add', function () {
        return view('web.admins.store-categories.other_categories_add');
    });
    Route::get('/admin/other-categories/edit', function () {
        return view('web.admins.store-categories.other_categories_edit');
    });

    Route::get('/admin/representative/list', [AdminRepresentativeController::class, 'index'])->name('representativ.index');
    Route::get('/admin/representative/add', [AdminRepresentativeController::class, 'add'])->name('representativ.add');
    Route::post('/admin/representative/store', [AdminRepresentativeController::class, 'store'])->name('representativ.store');
    Route::get('/admin/representative/edit/{id}', [AdminRepresentativeController::class, 'edit'])->name('representativ.edit');
    Route::post('/admin/representative/update/{id}', [AdminRepresentativeController::class, 'update'])->name('representativ.update');
    Route::get('/admin/representative/detail/{id}', [AdminRepresentativeController::class, 'detail'])->name('representativ.detail');
    Route::post('/admin/representative/delete/{id}', [AdminRepresentativeController::class, 'delete'])->name('representativ.delete');

    Route::post('/admin/representative/chnage-status', [AdminRepresentativeController::class, 'representatviteStatusChange'])->name('representativ.statusChange');
    Route::post('/admin/representative/chnage-status-inactive', [AdminRepresentativeController::class, 'representatviteStatusChangeInactive'])->name('representativ.statusChangeInactive');
});


// optional
// Route::get('/admin', function () {
//     return view('web.admins.auth.login');
// });


// Route::get('/admin/reset-password', function () {
//     return view('web.admins.auth.reset_password');
// });

Route::get('/admin/change-password', function () {
    return view('web.admins.auth.change_password');
});

Route::get('/admin/customers/list', function () {
    return view('web.admins.customers.customer_index');
});
Route::get('/admin/customer-detail', function () {
    return view('web.admins.customers.customer_detail');
});

Route::get('/admin/customer-order-history', function () {
    return view('web.admins.customers.customer_order_history');
});
Route::get('/admin/customer-order-history-detail', function () {
    return view('web.admins.customers.customer_order_history_detail');
});




// Route::get('/admin/Merchant-signup-requests/list', function () {
//     return view('web.admins.requests.Merchant_signup_request_index');
// });
// Route::get('/admin/Merchant-signup-request/view', function () {
//     return view('web.admins.requests.Merchant_signup_request_view');
// });
// Route::get('/admin/Menu-item-signup-request/list', function () {
//     return view('web.admins.requests.menu_item_index');
// });
// Route::get('/admin/Menu-item-signup-request/view', function () {
//     return view('web.admins.requests.menu_item_detail');
// });



Route::get('/admin/Merchants/list', function () {
    return view('web.admins.Merchants.Merchants_index');
});
Route::get('/admin/Merchants-detail', function () {
    return view('web.admins.Merchants.Merchants_detail');
});
Route::get('/admin/history-collection', function () {
    return view('web.admins.Merchants.history_collection');
});

Route::get('/admin/featured-slider/list', function () {
    return view('web.admins.featured-slider.featured_slider_index');
});
Route::get('/admin/featured-slider/add', function () {
    return view('web.admins.featured-slider.featured_slider_add');
});
Route::get('/admin/featured-slider/edit', function () {
    return view('web.admins.featured-slider.featured_slider_edit');
});

/******************Merchant Categories*********************/

// Route::get('/admin/store-categories/list', function () {
//     return view('web.admins.store-categories.store_categories_index');
// });
// Route::get('/admin/store-categories/add', function () {
//     return view('web.admins.store-categories.store_categories_add');
// });
// Route::get('/admin/store-categories/edit', function () {
//     return view('web.admins.store-categories.store_categories_edit');
// });

// Route::get('/admin/other-categories/list', function () {
//     return view('web.admins.store-categories.other_categories_index');
// });
// Route::get('/admin/other-categories/add', function () {
//     return view('web.admins.store-categories.other_categories_add');
// });
// Route::get('/admin/other-categories/edit', function () {
//     return view('web.admins.store-categories.other_categories_edit');
// });


/*******************Menu*****************/
Route::get('/admin/menu-item/list', function () {
    return view('web.admins.menu-item.menu_item_index');
});

Route::get('/admin/menu-item/view', function () {
    return view('web.admins.menu-item.menu_item_category');
});
Route::get('/admin/menu-item/add-on-option', function () {
    return view('web.admins.menu-item.menu_item_addon_detail');
});
/***************************************/

Route::get('/admin/discount/list', function () {
    return view('web.admins.discount.discount_index');
});
Route::get('/admin/discount/view', function () {
    return view('web.admins.discount.discount_detail');
});
Route::get('/admin/staff/list', function () {
    return view('web.admins.staff.staff_index');
});
Route::get('/admin/staff/view', function () {
    return view('web.admins.staff.staff_detail');
});
Route::get('/admin/commission', function () {
    return view('web.admins.commission.commission');
});


Route::get('/admin/Merchants-order-history', function () {
    return view('web.admins.Merchants.Merchants_order_history');
});
Route::get('/admin/Merchants-order-history-detail', function () {
    return view('web.admins.Merchants.Merchants_order_history_detail');
});

/**********************Orders*********************/
Route::get('/admin/new-orders/list', function () {
    return view('web.admins.orders.new_order_index');
});
Route::get('/admin/new-orders/view', function () {
    return view('web.admins.orders.new_order_detail');
});
Route::get('/admin/sehdule-orders/list', function () {
    return view('web.admins.orders.sehdule_order_index');
});
Route::get('/admin/Sehdule-order-detail', function () {
    return view('web.admins.orders.sehdule_order_detail');
});
Route::get('/admin/active-orders/list', function () {
    return view('web.admins.orders.active_orders_index');
});
Route::get('/admin/active-order-detail', function () {
    return view('web.admins.orders.active_order_detail');
});
Route::get('/admin/past-orders/list', function () {
    return view('web.admins.orders.past_orders_index');
});
Route::get('/admin/past-order-detail', function () {
    return view('web.admins.orders.past_order_detail');
});
/********************************************/

/**********************Representative********************/

// Route::get('/admin/representative/list', function () {
//     return view('web.admins.representatives.representative_index');
// });
// Route::get('/admin/representative/view', function () {
//     return view('web.admins.representatives.representative_detail');
// });
// Route::get('/admin/representative/add', function () {
//     return view('web.admins.representatives.representative_add');
// });
// Route::get('/admin/representative/edit', function () {
//     return view('web.admins.representatives.representative_edit');
// });

/********************************************/


Route::get('/admin/promo-code/list', function () {
    return view('web.admins.promo-codes.promo_code_index');
});
Route::get('/admin/promo-code/view', function () {
    return view('web.admins.promo-codes.promo_code_detail');
});
Route::get('/admin/promo-code/add', function () {
    return view('web.admins.promo-codes.promo_code_add');
});
Route::get('/admin/promo-code/edit', function () {
    return view('web.admins.promo-codes.promo_code_edit');
});

Route::get('/admin/plate-form/list', function () {
    return view('web.admins.plateform.plateform_setting');
});

Route::get('/admin/order-sales-report/list', function () {
    return view('web.admins.reports.orders_sales_report');
});

Route::get('/admin/notifications', function () {
    return view('web.admins.notifications.notifications');
});
Route::get('/admin/notification/send', function () {
    return view('web.admins.notifications.notification_send');
});
Route::get('/admin/profile', function () {
    return view('web.admins.auth.profile');
});
Route::get('/admin/profile/edit', function () {
    return view('web.admins.auth.edit_profile');
});

Route::get('/admin/earning-transactions/history', function () {
    return view('web.admins.earning.earning_transaction_history');
});
Route::get('/admin/earning-transactions/history/view', function () {
    return view('web.admins.earning.earning_transaction_history_detail');
});











// Representative dashboard

Route::get('/representative', function () {
    return view('web.representatives.auth.login');
})->name('representativeLogin');

Route::post('Representative-login', [RepresentativeController::class, 'representativeLogin'])->name('representative.login');

Route::post('Representative-reset', [RepresentativeController::class, 'representativeReset'])->name('representative.reset');


Route::middleware('representative_auth')->group(function () {
    Route::get('/representative/dashboard', function () {
        return view('web.representatives.dashboard');
    });
    Route::get('Representative-logOut', [RepresentativeController::class, 'representativeLogOut'])->name('representative.logOut');
});

Route::middleware('merchant_auth')->group(function (){
    Route::get('/merchant/dashboard', function () {
        return view('web.merchants.dashboard');
    });
    Route::get('merchat-logOut', [MerchantController::class, 'merchantLogOut'])->name('merchant.logOut');
});

// Route::get('/representative/dashboard', function () {
//     return view('web.representatives.dashboard');
// });


Route::get('/representative/reset-password', function () {
    return view('web.representatives.auth.reset_password');
});
Route::get('/representative/change-password', function () {
    return view('web.representatives.auth.change_password');
});
Route::get('/representative/profile', function () {
    return view('web.representatives.auth.profile');
});
Route::get('/representative/profile/edit', function () {
    return view('web.representatives.auth.edit_profile');
});


Route::get('/representative/earning-transactions/history', function () {
    return view('web.representatives.earning.earning_transaction_history');
});
Route::get('/representative/earning-transactions/history/view', function () {
    return view('web.representatives.earning.earning_transaction_history_detail');
});
Route::get('/representative/order-sales-report/list', function () {
    return view('web.representatives.reports.orders_sales_report');
});


Route::get('/representative/report-view', function () {
    return view('web.representatives.reports.report_view');
});

Route::get('/representative/fee/list', function () {
    return view('web.representatives.fee.fee_index');
});
Route::get('/representative/fee-detail', function () {
    return view('web.representatives.fee.fee_detail');
});



Route::get('/representative/merchant/list', function () {
    return view('web.representatives.merchants.merchant_index');
});
Route::get('/representative/merchant-detail', function () {
    return view('web.representatives.merchants.merchant_detail');
});
Route::get('/representative/merchant-add', function () {
    return view('web.representatives.merchants.merchant_add');
});
Route::get('/representative/merchant-edit', function () {
    return view('web.representatives.merchants.merchant_edit');
});


Route::get('/representative/menucategories/list', function () {
    return view('web.representatives.menu-categories.menu_categories_index');
});
Route::get('/representative/menucategories/add', function () {
    return view('web.representatives.menu-categories.menu_categories_add');
});
Route::get('/representative/menucategories/edit', function () {
    return view('web.representatives.menu-categories.menu_categories_edit');
});
Route::get('/representative/menucategories/view', function () {
    return view('web.representatives.menu-categories.menu_categories_detail');
});

Route::get('/representative/menu-item/list', function () {
    return view('web.representatives.menu-item.menu_item_index');
});
Route::get('/representative/menu-item/add', function () {
    return view('web.representatives.menu-item.menu_item_add');
});
Route::get('/representative/menu-item/edit', function () {
    return view('web.representatives.menu-item.menu_item_edit');
});
Route::get('/representative/menu-item/view', function () {
    return view('web.representatives.menu-item.menu_item_category');
});
Route::get('/representative/menu-item/add-on-option', function () {
    return view('web.representatives.menu-item.menu_item_addon_detail');
});
Route::get('/representative/menu-item/addon-category-edit', function () {
    return view('web.representatives.menu-item.menu_item_addon_category_edit');
});
Route::get('/representative/menu-item/addon-category-add', function () {
    return view('web.representatives.menu-item.menu_item_addon_category_add');
});
Route::get('/representative/menu-item/addon-option-add', function () {
    return view('web.representatives.menu-item.menu_item_addon_option_add');
});
Route::get('/representative/menu-item/addon-option-edit', function () {
    return view('web.representatives.menu-item.menu_item_addon_option_edit');
});


//*********************************************frontRepresentative*********************************************************************** */
Route::post('Representative-store', [RepresentativeController::class, 'store'])->name('forntRepresentative.store');
Route::get('/merchant', function () {
    return view('web.merchants.auth.login');
})->name('merchantLogin');
Route::post('merchant-login',[MerchantController::class,'merchantLogin'])->name('merchant.Login');

Route::post('merchant-reset',[MerchantController::class,'resetPassword'])->name('merchant.resetPassword');









// Route::get('/representative/setting/list', function () {
//     return view('web.representatives.setting.setting');
// });
// Route::get('/representative/notifications', function () {
//     return view('web.representatives.notifications.notifications');
// });

require __DIR__ . '/merchant.php';
