<?php

use App\Http\Controllers\Dashboard\AboutUsController;
use App\Http\Controllers\Dashboard\CartController;
use App\Http\Controllers\Dashboard\CartDetailControlller;
use App\Http\Controllers\Dashboard\CartStoreController;
use App\Http\Controllers\Dashboard\CommonQuestionsController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\CuponController;
use App\Http\Controllers\Dashboard\GenerateCartController;
use App\Http\Controllers\Dashboard\HowUseController;
use App\Http\Controllers\Dashboard\MarketController;
use App\Http\Controllers\Dashboard\ParentCategoryController;
use App\Http\Controllers\Dashboard\PayCurrencieController;
use App\Http\Controllers\Dashboard\PrivacyPolicyController;
use App\Http\Controllers\Dashboard\ReturnPolicyController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\UsagePolicyController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\GenerateCartController;
use App\Http\Controllers\PayCurrencieController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SupportCartController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::prefix(LaravelLocalization::setLocale())->middleware('localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

            //user routes
            Route::resource('users', UserController::class)->except(['show']);

            //cupons routs
            Route::resource('cupons', CuponController::class)->except(['show']);

            //parent_category routs
            Route::resource('parent_category', ParentCategoryController::class)->except(['show']);

            //sub_category routs
            Route::resource('sub_categories', SubCategoryController::class)->except(['show']);

            //markets routs
            Route::resource('markets', MarketController::class)->except(['show']);

            //carts routs
            Route::resource('carts', CartController::class)->except(['show']);

            //carts routs
            Route::resource('carts_detail', CartDetailControlller::class)->except(['show']);

            //carts routs
            Route::resource('carts_store', CartStoreController::class)->except(['show']);

            //generate carts  routs
            Route::resource('generate_carts', GenerateCartController::class)->except(['show']);

            //generate carts  routs
            Route::resource('pay_currencie', PayCurrencieController::class)->except(['show', 'create', 'store', 'distroy']);
            Route::get('/pending_requests', [PayCurrencieController::class, 'pending_requests'])->name('pending_requests');
            Route::post('/not_exept/{number}', [PayCurrencieController::class, 'not_exept'])->name('not_exept');
            Route::post('/pay_currencie_details/{number}', [PayCurrencieController::class, 'pay_currencie_details'])->name('pay_currencie_details');

            //connect us  routs
            Route::resource('connect_us', ContactUsController::class)->except(['show']);

            //usage policy  routs
            Route::resource('usage_policy', UsagePolicyController::class)->except(['show']);

            //privacy policy  routs
            Route::resource('privacy_policy', PrivacyPolicyController::class)->except(['show']);

            //return policy  routs
            Route::resource('return_policy', ReturnPolicyController::class)->except(['show']);

            //about us  routs
            Route::resource('about_us', AboutUsController::class)->except(['show']);

            //CommonQuestions  routs
            Route::resource('common_questions', CommonQuestionsController::class)->except(['show']);
            //export excel file
            Route::get('export_carts', [GenerateCartController::class, 'export']);

            //ended carts
            Route::get('ended_carts_page', [GenerateCartController::class, 'ended_carts'])->name('ended_carts_page');

            Route::resource('how_to_use', HowUseController::class)->except(['show']);

            Route::get('/ticit-list', [SupportCartController::class, 'update'])->name('ticit-list');

            Route::get('social_links.index', [SettingsController::class, 'index'])->name('social_links.index');
            Route::get('social_login.index', [SettingsController::class, 'social_login'])->name('social_login.index');
            Route::post('social_links.store', [SettingsController::class, 'store'])->name('social_links.store');

        }); //end of dashboard routes

        // Auth::routes();

    });
