<?php

namespace Src\Calc;

use function cli\line;
use function cli\prompt;
use function Src\Engine\welcome;
use function Src\Engine\engine;

use const Src\Engine\ROUNDS_COUNT;

function calc(): void
{
    $operations = ['*', '+', '-'];
    $name = welcome();
    line('What is the result of the expression?');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randOperation = rand(0, 2);
        $operation = $operations[$randOperation];
        $randNum1 = rand(1, 10);
        $randNum2 = rand(1, 10);

        if ($operation === '+') {
            $correctAnswer = $randNum1 + $randNum2;
        } elseif ($operation === '-') {
            $correctAnswer === $randNum1 - $randNum2;
        } else {
            $correctAnswer = $randNum1 * $randNum2;
        }
        $question = "{$randNum1} {$operation} {$randNum2}";
        $correctAnswer = (string) $correctAnswer;
        $engine = engine($question, $correctAnswer);
        if ($engine) {
            $result = "Congratulations, {$name}!";
        } else {
            $result = "Let's try again, {$name}!";
            break;
        }
    }
    line($result);
}
