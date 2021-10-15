<?php

namespace Src\Prime;

use function cli\line;
use function cli\prompt;

function prime()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}! \n");
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $randNum = rand(1, 100);
        line("Question: {$randNum}");
        if (isPrime($randNum)) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$name}!");
            return false;
        }
    }
    line("Congratulations, {$name}!");
}

function isPrime($number)
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
