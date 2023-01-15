<?php

namespace App\Doubles;

class Subscription
{
    private Gateway $gateway;
    private Mailer $mailer;

    public function __construct(Gateway $gateway, Mailer $mailer)
    {
        $this->gateway = $gateway;
        $this->mailer = $mailer;
    }

    public function create(User $user)
    {
        //create the subscription through Stripe
        $receipt = $this->gateway->create();

        //update local user record
        $user->markAsSubscribed();

        //send a welcome email or dispatch event
        $this->mailer->deliver('Your receipt number is: ' . $receipt);
    }
}