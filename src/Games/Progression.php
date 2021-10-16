<?php

namespace Src\Progression;

use function cli\line;
use function cli\prompt;
use function Src\Engine\welcome;
use function Src\Engine\engine;

use const Src\Engine\ROUNDS_COUNT;

function progression(): void
{
    $name = welcome();
    line('What number is missing in the progression?');
    for ($j = 0; $j < ROUNDS_COUNT; $j++) {
        $progressionLenght = rand(6, 10);
        $temp = rand(1, 10);
        $progressionElement = rand(1, 15);
        $progression = [];
// Создаем прогрессию рандомной длины
        for ($i = 0; $i < $progressionLenght; $i++) {
            $temp = $temp + $progressionLenght;
            $progression[] = $temp;
        }
// Берем рандомный элемент прогрессии и сохраняем этот элемент в переменной
        $position = array_rand($progression, 1);
        $correctAnswer = $progression[$position];
// Прячем рандомный элемент прогрессии
        for ($e = 0; $e < $progressionLenght; $e++) {
            $progression[$position] = '..';
        }
        $question = implode(" ", $progression);
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
