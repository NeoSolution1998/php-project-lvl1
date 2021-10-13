<?php

namespace Src\Even;

use function cli\line;
use function cli\prompt;

function game()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $randNum = rand(0, 100);
        line("Question: {$randNum}");
        $answer = prompt('Your answer');
        if ($randNum % 2 == 0 && $answer === 'yes') {
            line('Correct!');
        } elseif ($randNum % 2 != 0 && $answer === 'no') {
             line('Correct!');
        } else {
            if ($randNum % 2 == 0) {
                 $correctAnswer = 'yes';
            } elseif ($randNum % 2 != 0) {
                $correctAnswer = 'no';
            }
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
                line("Let's try again, {$name}!");
            return false;
        }
    }
    line("Congratulations, {$name}");
}
