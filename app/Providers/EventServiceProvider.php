<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;



class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ChangePassword::class => [
            'App\Listeners\LogAuthentication@onChangePassword',
        ],

        'Illuminate\Auth\Events\PasswordReset' => [
            'App\Listeners\LogAuthentication@onPasswordReset',

        ],

        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogAuthentication@onUserLogin',
        ],

        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\LogAuthentication@onUserLogout',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
