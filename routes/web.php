<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;

Route::prefix(LaravelLocalization::setLocale())->middleware('localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () { //...

    Route::get('/dd', function () {
        return 'true';
        \Artisan::call('storage:link');
    });

    Route::get('/', [Home\WelcomeController::class, 'index'])->name('/');
    Route::get('referral/{assign}', [Home\AssignmenController::class, 'index'])->name('Assignmen');
    Route::get('AssignmenController', [Home\AssignmenController::class, 'get'])->name('AssignmenController');

    // user profile
    Route::resource('profiles', Home\ProfileController::class);
    Route::post('change.password/{id}', [Home\ProfileController::class, 'changePassword'])->name('changePassword');
    Route::post('LoginCline', [Home\ProfileController::class, 'login'])->name('LoginCline');
    Route::post('register.mobile', [Home\ProfileController::class, 'RegisterMobile'])->name('register.mobile');
    Route::post('recharge{id}', [Home\ProfileController::class, 'recharge'])->name('recharge');
    Route::post('logouts', [Home\ProfileController::class, 'logouts'])->name('logouts');

    // user auth messges
    Route::post('/registers', [Home\AuthController::class, 'create'])->name('registers');

    // route slogin google and favebook
    Route::get('login/{provider}', [Home\AuthController::class, 'redirect'])->where('provider', 'facebook|google|twitter');
    Route::get('login/{provider}/callback', [Home\AuthController::class, 'Callback'])->where('provider', 'facebook|google|twitter');

    // route show prouduc
    Route::get('product/{category}', [Home\WelcomeController::class, 'show_market'])->name('product');
    Route::get('product_not_stor/{category}/{market}', [Home\WelcomeController::class, 'show_cart'])->name('product_not_stor');
    Route::get('show_carts/{category}/{market}', [Home\WelcomeController::class, 'show_carts'])->name('show_carts');
    Route::get('product_show_details/{category}/{cart}', [Home\WelcomeController::class, 'show_details'])->name('product_show_details');
    Route::get('exchabges-rates', [Home\WelcomeController::class, 'change_currency'])->name('exchabges-rates');
    Route::get('How-Useage/{sub_category_id}', [Home\WelcomeController::class, 'how_useage'])->name('How-Useage');

    // route Footer
    Route::get('Contact-Us', [Home\FooterController::class, 'showcontact'])->name('contact');
    Route::post('Contact-Us', [Home\FooterController::class, 'storecontact'])->name('storecontact');
    Route::get('About-Us', [Home\FooterController::class, 'showabout'])->name('showabout');
    Route::get('Usage-Policy', [Home\FooterController::class, 'ShowUsagePolicy'])->name('ShowUsagePolicy');
    Route::get('SearchCarts', [Home\FooterController::class, 'SearchCarts'])->name('SearchCarts');
    Route::get('Privacy-Policy', [Home\FooterController::class, 'showPrivacyPolicy'])->name('showPrivacyPolicy');
    Route::get('Recovery-Policy', [Home\FooterController::class, 'showRecovery'])->name('showRecovery');
    Route::get('Recovery-common_questions', [Home\FooterController::class, 'common_questions'])->name('common_questions');

    //rout wallet
    Route::get('/wallet', [Home\WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet/{carts}', [Home\WalletController::class, 'store'])->name('wallet.store');
    Route::patch('/wallet/{cart}', [Home\WalletController::class, 'update'])->name('wallet.update');
    Route::delete('/walletdel/{id}', [Home\WalletController::class, 'destroy'])->name('wallet.destroy');
    Route::post('/incDes{id}', [Home\WalletController::class, 'IncDes'])->name('incdes');
    Route::get('rate', [Home\RateController::class, 'index']);

    //route coupon
    Route::post('/coupon', [Home\CouponsController::class, 'store'])->name('coupon.store');
    Route::delete('/coupon/delete', [Home\CouponsController::class, 'destroy'])->name('coupon.destroy');

    Route::get('/incDes{id}', [Home\WalletController::class, 'IncDes'])->name('incdes');

    // Routs purchase
    Route::resource('Purchase', Home\PurchaseController::class);
    Route::get('Fast-Purchase', [Home\PurchaseController::class, 'index'])->name('purchase.index');
    Route::get('Fast-Purchase-categorys/{id}', [Home\PurchaseController::class, 'parent_category'])->name('purchase.categorys');
    Route::get('Fast-Purchase-sub_categoryed/{id}', [Home\PurchaseController::class, 'sub_categoryed'])->name('purchase.sub_categoryed');
    Route::get('Fast-Purchase-makted/{id}', [Home\PurchaseController::class, 'makted'])->name('purchase.makted');

    Route::resource('ticit', Home\SupportCartController::class);
    Route::get('/ticit-admin', [Home\SupportCartController::class, 'get'])->name('ticit-admin');
    Route::post('test', [Home\SupportCartController::class, 'test'])->name('test');

    Route::get('/verify', [Home\AuthController::class, 'verify'])->name('verify');
    Route::post('/isverify', [Home\AuthController::class, 'isverify'])->name('isverify');
    Route::get('/Email/{id}/{code}', [Home\AuthController::class, 'emailverify'])->name('emailverify');
    Route::get('/returnverify', [Home\AuthController::class, 'returnverify'])->name('returnverify');

    //payment system
    Route::get('/payment', [Home\OrderController::class, 'index'])->name('payment');
    Route::post('order.pay.store', [Home\OrderController::class, 'paystore'])->name('order.pay.store');
    Route::post('/storeToPayment{carts}', [Home\WalletController::class, 'storeToPayment'])->name('storeToPayment');
    Route::get('/payment-store', [Home\OrderController::class, 'store'])->name('payment-store');
    Route::get('/payment-show', [Home\OrderController::class, 'show'])->name('payment-show');
    Route::get('/payment-search', [Home\OrderController::class, 'search'])->name('payment-search');
    Route::get('/complete', [Home\OrderController::class, 'complete'])->name('complete');
    Route::get('/my_purchase', [Home\OrderController::class, 'my_purchase'])->name('my_purchase');
    Route::get('/purchase_details/{number}', [Home\OrderController::class, 'purchase_details'])->name('purchase_details');
    Route::get('/purchase_invoices/{number}', [Home\OrderController::class, 'purchase_invoices'])->name('purchase_invoices');
    Route::get('/purchase_admin', [Home\OrderController::class, 'purchase_admin'])->name('purchase_admin');
    Route::get('/purchases_search', [Home\OrderController::class, 'purchases_search'])->name('purchases_search');
    Route::delete('/purchase_delete/{order}', [Home\OrderController::class, 'purchase_delete'])->name('purchase_delete');
    Route::delete('/payment-delete/{cartStore}', [Home\OrderController::class, 'destroy'])->name('payment-delete');

    //email system
    Route::resource('SmartEmail', Home\SmartEmailController::class);
    Route::resource('HolidayMessage', Home\HolidayMessageController::class);
    Route::resource('MonthlyMessage', Home\MonthlyMessageController::class);

    //stars system
    Route::get('stars', [Home\StarsController::class, 'index'])->name('stars');
    Route::get('order_by_satrs/{cart}', [Home\StarsController::class, 'order_by_satrs'])->name('order_by_satrs');
    Route::get('notify', [Home\StarsController::class, 'notify'])->name('notify');

    //notify

    // this is auth
    Auth::routes(['register' => false]);

}); //end of end
