<?php

namespace App;

class Quiz
{
    private array $qustions;

    public function addQuestion(Question $question)
    {
        $this->qustions[] = $question;
    }

    public function nextQuestion()
    {
        return $this->qustions[0];
    }

    public function questions()
    {
        return $this->qustions;
    }

    public function grade()
    {
        return (count($this->correctlyAnsweredQuestions()) / count($this->qustions)) * 100;
    }

    private function correctlyAnsweredQuestions()
    {
        return array_filter($this->qustions, function ($qustions) {
            return $qustions->isCorrect();
        });
    }
}
