<?php

namespace App\Doubles;

class Mailer
{
    public function deliver(string $message)
    {
        echo 'from Mailer deliver';
    }
}