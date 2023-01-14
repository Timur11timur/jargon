<?php

namespace App\Quiz;

use Exception;

class Quiz
{
    private Questions $questions;

    public function __construct()
    {
        $this->questions = new Questions();
    }

    public function addQuestion(Question $question): void
    {
        $this->questions->add($question);
    }

    public function begin(): Question
    {
        return $this->nextQuestion();
    }

    public function nextQuestion(): Question|false
    {
        return $this->questions->next();
    }

    public function questions(): Questions
    {
        return $this->questions;
    }

    public function isComplete(): bool
    {
        return count($this->questions->answered()) === $this->questions->count();
    }

    public function grade(): int
    {
        if (!$this->isComplete()) {
            throw new Exception('This quiz has not yet been completed!');
        }

        return (count($this->questions->solved()) / $this->questions->count()) * 100;
    }
}
