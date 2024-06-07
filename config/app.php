<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    'providers' => ServiceProvider::defaultProviders()->merge([
        Maatwebsite\Excel\ExcelServiceProvider::class,
        Gloudemans\Shoppingcart\ShoppingcartServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        Intervention\Image\ImageServiceProvider::class,
        Mckenziearts\Notify\LaravelNotifyServiceProvider::class,
        Laravel\Socialite\SocialiteServiceProvider::class,
        Anhskohbo\NoCaptcha\NoCaptchaServiceProvider::class,
    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([
        'Cart' => Gloudemans\Shoppingcart\Facades\Cart::class,
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        'Image' => Intervention\Image\Facades\Image::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Socialite' => Laravel\Socialite\Facades\Socialite::class,
    ])->toArray(),

];
