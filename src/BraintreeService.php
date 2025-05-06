<?php

namespace Laravel\Cashier;

use Braintree\Gateway;
use Exception;
use Braintree\Plan;
use Braintree\Plan as BraintreePlan;

class BraintreeService
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = app(Gateway::class);
    }
    
    /**
     * Get the Braintree plan that has the given ID.
     *
     * @param  string  $id
     * @return \Braintree\Plan
     * @throws \Exception
     */
    public static function findPlan($id): Plan
    {
        $gateway = app(Gateway::class);
        $plans = $gateway->plan()->all();

        foreach ($plans as $plan) {
            if ($plan->id === $id) {
                return $plan;
            }
        }

        throw new Exception("Unable to find Braintree plan with ID [{$id}].");
    }
}
