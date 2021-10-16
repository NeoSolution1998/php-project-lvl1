<?php

namespace Src\Gcd;

use function cli\line;
use function cli\prompt;
use function Src\Engine\welcome;
use function Src\Engine\engine;

use const Src\Engine\ROUNDS_COUNT;

function gcd(): void
{
    $name = welcome();
    line('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randNum1 = rand(2, 100);
        $randNum2 = rand(2, 100);
        $question = (string) ("{$randNum1} {$randNum2}");
        $correctAnswer = isGcd($randNum1, $randNum2);
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

function isGcd(int $n, int $m): int
{
    if ($m > 0) {
        return isGcd($m, $n % $m);
    } else {
        return abs($n);
    }
}
