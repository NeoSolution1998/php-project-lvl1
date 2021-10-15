<?php

namespace Src\Gcd;

use function cli\line;
use function cli\prompt;

function gcd(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < 3; $i++) {
        $randNum1 = rand(0, 100);
        $randNum2 = rand(0, 100);
        line("Question: {$randNum1} {$randNum2}");
        $answer = prompt('Your answer');
        $correctAnswer = checkgcd($randNum1, $randNum2);
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$name}!");
            return false;
        }
    }
    line("Congratulations, {$name}!");
}

function checkgcd(int $n, int $m): int
{
    if ($m > 0) {
        return checkgcd($m, $n % $m);
    } else {
        return abs($n);
    }
}
