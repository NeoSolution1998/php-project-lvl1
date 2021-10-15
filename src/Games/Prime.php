<?php

namespace Src\Prime;

use function cli\line;
use function cli\prompt;
use function Src\Engine\welcome;
use function Src\Engine\engine;

use const Src\Engine\ROUNDS_COUNT;

function prime(): void
{
    $name = welcome();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randNum = rand(1, 100);
        $question = $randNum;
        $correctAnswer = isPrime($randNum);
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

function isPrime(int $randNum): string
{
    for ($j = 2; $j < $randNum; $j++) {
        if ($randNum % $j === 0) {
            return 'no';
        }
    }
    return 'yes';
}
