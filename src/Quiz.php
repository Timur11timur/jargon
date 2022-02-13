<?php

namespace App;

class Quiz
{
    private array $qustions;

    private $currentQuestion = 1;

    public function addQuestion(Question $question)
    {
        $this->qustions[] = $question;
    }

    public function nextQuestion()
    {
        if (! isset($this->qustions[$this->currentQuestion - 1])) {
            return false;
        }

        $qustions =  $this->qustions[$this->currentQuestion - 1];
        $this->currentQuestion++;

        return $qustions;
    }

    public function questions()
    {
        return $this->qustions;
    }

    public function isComplete()
    {
        return count(array_filter($this->qustions, function ($qustions) {
            return $qustions->answered();
        })) === count($this->qustions);
    }

    public function grade()
    {
        if (! $this->isComplete()) {
            throw new \Exception('This quiz has not yet been completed!');
        }

        return (count($this->correctlyAnsweredQuestions()) / count($this->qustions)) * 100;
    }

    private function correctlyAnsweredQuestions()
    {
        return array_filter($this->qustions, function ($qustions) {
            return $qustions->isCorrect();
        });
    }
}
