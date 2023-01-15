<?php

namespace App\Doubles;

class StripeGateway implements Gateway
{
    public function create(): string
    {
        //performs the Stripe HTTP request
        echo 'Slow HTTP request in progress.';

        return 'some-receipt';
    }
}