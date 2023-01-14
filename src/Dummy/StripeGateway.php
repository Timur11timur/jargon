<?php

namespace App\Dummy;

class StripeGateway implements Gateway
{
    public function create()
    {
        //performs the Stripe HTTP request
        echo 'Slow HTTP request in progress.';
    }
}