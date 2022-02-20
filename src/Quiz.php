<?php

namespace App;

use Exception;

class Quiz
{
    private Questions $questions;

    public function __construct()
    {
        $this->questions = new Questions();
    }

    public function addQuestion(Question $question)
    {
        $this->questions->add($question);
    }

    public function begin()
    {
        return $this->nextQuestion();
    }

    public function nextQuestion()
    {
        return $this->questions->next();
    }

    public function questions()
    {
        return $this->questions;
    }

    public function isComplete()
    {
        return count($this->questions->answered()) === $this->questions->count();
    }

    public function grade()
    {
        if (! $this->isComplete()) {
            throw new Exception('This quiz has not yet been completed!');
        }

        return (count($this->questions->solved()) / $this->questions->count()) * 100;
    }
}
