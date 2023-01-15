<?php

namespace App\Doubles;

class User
{
    private string $name;
    private bool $subscribed = false;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function isSubscribed(): bool
    {
        return $this->subscribed;
    }

    public function markAsSubscribed(): void
    {
        $this->subscribed = true;
    }
}