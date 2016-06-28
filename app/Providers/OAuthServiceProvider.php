<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['api.auth']->extend('oauth', function ($app) {

            $provider = new \Dingo\Api\Auth\Provider\OAuth2($app['oauth2-server.authorizer']->getChecker(), false);

            $provider->setUserResolver(function ($id) {
                // Logic to return a user by their ID.
                return \App\User::findOrFail($id);
            });

            $provider->setClientResolver(function ($id) {
                // Logic to return a client by their ID.
                return \App\User::findOrFail($id);
            });

            return $provider;

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
