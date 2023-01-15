<?php

namespace Tests;

use App\Doubles\Gateway;
use App\Doubles\Mailer;
use App\Doubles\Subscription;
use App\Doubles\User;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    /** @test */
    public function it_creates_a_stripe_subscription()
    {
        $this->markTestSkipped();
    }

    /** @test */
    public function creating_a_subscription_marks_the_user_as_subscribed()
    {
//        $gateway = new FakeGateway();
        $gateway = $this->createMock(Gateway::class);       //Dummy
        $mailer = $this->createMock(Mailer::class);         //Dummy
        $subscription = new Subscription($gateway, $mailer);
        $user = new User('JohnDoe');

        $this->assertFalse($user->isSubscribed());

        $subscription->create($user);

        $this->assertTrue($user->isSubscribed());
    }

    /** @test */
    public function it_delivers_a_receipt()
    {
        $gateway = $this->createMock(Gateway::class);
        $gateway->method('create')                                 //Stub
            ->willReturn('receipt-stub');

        $mailer = $this->createMock(Mailer::class);
        $mailer->expects($this->once())                                     //Mock
            ->method('deliver')
            ->with('Your receipt number is: receipt-stub');

        $subscription = new Subscription($gateway, $mailer);
        $user = new User('JohnDoe');

        $subscription->create($user);
    }
}