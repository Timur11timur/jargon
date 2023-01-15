<?php

namespace Tests;

use App\Doubles\Gateway;

class FakeGateway implements Gateway
{
    public function create(): string
    {
        return 'receipt-from-fake-gateway';
    }
}