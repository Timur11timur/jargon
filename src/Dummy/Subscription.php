<?php

namespace App\Dummy;

class Subscription
{
    private Gateway $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function create(User $user)
    {
        //create the subscription through Stripe
        $this->gateway->create();

        //update local user record
        $user->markAsSubscribed();

        //send a welcome email or dispatch event
    }
}