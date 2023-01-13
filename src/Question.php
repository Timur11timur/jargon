<?php

namespace App;

class Question
{
    private string $body;

    private mixed $solution;

    private mixed $answer;

    private bool $correct;

    public function __construct(string $body, mixed $solution)
    {
        $this->body = $body;
        $this->solution = $solution;
    }

    public function answer(mixed $answer): bool
    {
        $this->answer = $answer;

        return $this->solved();
    }

    public function answered(): bool
    {
        return isset($this->answer);
    }

    public function solved(): bool
    {
        return $this->answer === $this->solution;
    }
}
