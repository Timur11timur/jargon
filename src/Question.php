<?php

namespace App;

class Question
{
    private $body;

    private $solution;

    private $answer;

    private $correct;

    public function __construct($body, $solution)
    {
        $this->body = $body;
        $this->solution = $solution;
    }

    public function answer($answer)
    {
        $this->answer = $answer;

        return $this->solved();
    }

    public function answered()
    {
        return isset($this->answer);
    }

    public function solved()
    {
        return $this->answer === $this->solution;
    }
}
