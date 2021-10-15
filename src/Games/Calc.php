<?php

namespace Src\Calc;

use function cli\line;
use function cli\prompt;

function calc()
{
    $operations = ['*', '+', '-'];
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line('What is the result of the expression?');
    for ($i = 0; $i < 3; $i++) {
        $randOperation = rand(0, 2);
        $operation = $operations[$randOperation];
        $randNum1 = rand(0, 10);
        $randNum2 = rand(0, 10);
        line("Question: {$randNum1} {$operation} {$randNum2}");
        $answer = prompt('Your answer');
        if ($operation === '+') {
            if ($answer == $randNum1 + $randNum2) {
                line('Correct!');
            } else {
                $correctAnswer = $randNum1 + $randNum2;
                line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
                line("Let's try again, {$name}!");
                return false;
            }
        }
        if ($operation === '-') {
            if ($answer == $randNum1 - $randNum2) {
                line('Correct!');
            } else {
                $correctAnswer = $randNum1 - $randNum2;
                line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
                line("Let's try again, {$name}!");
                return false;
            }
        }
        if ($operation === '*') {
            if ($answer == $randNum1 * $randNum2) {
                line('Correct!');
            } else {
                $correctAnswer = $randNum1 * $randNum2;
                line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
                line("Let's try again, {$name}!");
                return false;
            }
        }
    }
    line("Congratulations, {$name}!");
}
