<?php

namespace Src\Even;

use function cli\line;
use function cli\prompt;
use function Src\Engine\welcome;
use function Src\Engine\engine;

function game(): void
{
    $name = welcome();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
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
