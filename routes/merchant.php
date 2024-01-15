<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Merchant\MerchantController;



// merchant dashboard
Route::prefix('merchant')->group(function () {
    Route::get('/', function () {
        return view('web.merchants.auth.login');
    });
    Route::get('/profile', function () {
        return view('web.merchants.auth.profile');
    });
    Route::get('/profile/edit', function () {
        return view('web.merchants.auth.edit_profile');
    });

    Route::get('/reset-password', function () {
        return view('web.merchants.auth.reset_password');
    });
    Route::get('/change-password', function () {
        return view('web.merchants.auth.change_password');
    });



    Route::get('/menucategories/list', function () {
        return view('web.merchants.menu-categories.menu_categories_index');
    });
    Route::get('/menucategories/add', function () {
        return view('web.merchants.menu-categories.menu_categories_add');
    });
    Route::post('/menucategories/save', [MerchantController::class, 'saveMerchantMenuCat'])->name('save-merchant-menu-cat');

    Route::get('/menucategories/edit', function () {
        return view('web.merchants.menu-categories.menu_categories_edit');
    });
    Route::get('/menucategories/view', function () {
        return view('web.merchants.menu-categories.menu_categories_detail');
    });

    Route::get('/menu-item/list', function () {
        return view('web.merchants.menu-item.menu_item_index');
    });
    Route::get('/menu-item/add', function () {
        return view('web.merchants.menu-item.menu_item_add');
    });
    Route::get('/menu-item/edit', function () {
        return view('web.merchants.menu-item.menu_item_edit');
    });
    Route::get('/menu-item/view', function () {
        return view('web.merchants.menu-item.menu_item_category');
    });
    Route::get('/menu-item/add-on-option', function () {
        return view('web.merchants.menu-item.menu_item_addon_detail');
    });
    Route::get('/menu-item/addon-category-edit', function () {
        return view('web.merchants.menu-item.menu_item_addon_category_edit');
    });
    Route::get('/menu-item/addon-category-add', function () {
        return view('web.merchants.menu-item.menu_item_addon_category_add');
    });
    Route::get('/menu-item/addon-option-add', function () {
        return view('web.merchants.menu-item.menu_item_addon_option_add');
    });
    Route::get('/menu-item/addon-option-edit', function () {
        return view('web.merchants.menu-item.menu_item_addon_option_edit');
    });

    Route::get('/promo-code/list', function () {
        return view('web.merchants.discount.promo_code_index');
    });
    Route::get('/promo-code/add', function () {
        return view('web.merchants.discount.promo_code_add');
    });
    Route::get('/promo-code/edit', function () {
        return view('web.merchants.discount.promo_code_edit');
    });
    Route::get('/promo-code/view', function () {
        return view('web.merchants.discount.promo_code_detail');
    });


    Route::get('/new-orders/list', function () {
        return view('web.merchants.orders.new_order_index');
    });
    Route::get('/new-orders/view', function () {
        return view('web.merchants.orders.new_order_detail');
    });
    Route::get('/active-orders/list', function () {
        return view('web.merchants.orders.active_orders_index');
    });
    Route::get('/active-order-detail', function () {
        return view('web.merchants.orders.active_order_detail');
    });
    Route::get('/past-orders/list', function () {
        return view('web.merchants.orders.past_orders_index');
    });
    Route::get('/past-order-detail', function () {
        return view('web.merchants.orders.past_order_detail');
    });
    Route::get('/sehdule-orders/list', function () {
        return view('web.merchants.orders.sehdule_order_index');
    });
    Route::get('/Sehdule-order-detail', function () {
        return view('web.merchants.orders.sehdule_order_detail');
    });

    Route::get('/earning-transactions/history', function () {
        return view('web.merchants.earning.earning_transaction_history');
    });
    Route::get('/earning-transactions/history/view', function () {
        return view('web.merchants.earning.earning_transaction_history_detail');
    });

    Route::get('/order-sales-report/list', function () {
        return view('web.merchants.reports.orders_sales_report');
    });

    Route::get('/setting/list', function () {
        return view('web.merchants.setting.setting');
    });
    Route::get('/notifications', function () {
        return view('web.merchants.notifications.notifications');
    });
    Route::get('/staff', function () {
        return view('web.merchants.Staff.staff_index');
    });
    Route::get('/staff-add', function () {
        return view('web.merchants.Staff.staff_add');
    });
    Route::get('/staff-edit', function () {
        return view('web.merchants.Staff.staff_edit');
    });
    Route::get('/staff-view', function () {
        return view('web.merchants.Staff.staff_detail');
    });


    Route::get('/hours-list', function () {
        return view('web.merchants.working-hours.hours_index');
    });
    Route::get('/hours-add', function () {
        return view('web.merchants.working-hours.hours_add');
    });
    Route::get('/hours-view', function () {
        return view('web.merchants.working-hours.hours_detail');
    });
    Route::get('/hours-edit', function () {
        return view('web.merchants.working-hours.hours_edit');
    });

    Route::get('/shift-list', function () {
        return view('web.merchants.working-shift.shift_index');
    });
    Route::get('/shift-add', function () {
        return view('web.merchants.working-shift.shift_add');
    });
    Route::get('/shift-view', function () {
        return view('web.merchants.working-shift.shift_detail');
    });
    Route::get('/shift-edit', function () {
        return view('web.merchants.working-shift.shift_edit');
    });


});

