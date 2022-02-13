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

        $this->correct = ($answer === $this->solution);

        return $this->correct;
    }

    public function answered()
    {
        return isset($this->answer);
    }

    public function isCorrect()
    {
        return $this->correct;
    }
}
