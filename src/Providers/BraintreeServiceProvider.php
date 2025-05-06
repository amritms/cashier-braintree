<?php

namespace Laravel\Cashier\Providers;

use Braintree\Gateway;
use Illuminate\Contracts\Support\DeferrableProvider;
use Laravel\Cashier\BrainTreeGateway;
use Illuminate\Support\ServiceProvider;


class BraintreeServiceProvider extends ServiceProvider {

    public function boot()
    {
    }

    public function register() {
        $this->app->singleton(Gateway::class, function($app) {
            return new Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchant_id'),
                'publicKey' => config('services.braintree.public_key'),
                'privateKey' => config('services.braintree.private_key')
            ]);
        });
        $this->app->singleton('foo', function() {
            return 'bar';
        });
    }

    
}
