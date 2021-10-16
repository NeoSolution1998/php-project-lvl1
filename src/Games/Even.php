<?php

namespace Src\Even;

use function cli\line;
use function cli\prompt;
use function Src\Engine\welcome;
use function Src\Engine\engine;

use const Src\Engine\ROUNDS_COUNT;

function game(): void
{
    $name = welcome();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randNum = rand(0, 100);
        $question = (string) $randNum;
        $correctAnswer = isEven($randNum);
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
function isEven(int $randNum): string
{
    if ($randNum % 2 === 0) {
        return 'yes';
    }
        return 'no';
}
