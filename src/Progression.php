<?php

namespace Src\Progression;

use function cli\line;
use function cli\prompt;

function progression()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What number is missing in the progression?');
    for ($j = 0; $j < 3; $j++) {
    $randNum = rand(1, 10);
    $randNum2 = rand(0, 9);
    $randStart = rand(1, 15);
    $arr = [];
        for($i = 0; $i < 10; $i++){
            $randNum = $randNum + $randStart;
            $arr[] = $randNum;
        }
        $correctAnswer = $arr[$randNum2];
        for($i = 0; $i < 10; $i++){
            $arr[$randNum2] = '..';
        }

        $progression = implode(" ", $arr);
        line("Question: {$progression}");
        $answer = prompt('Your answer');
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
