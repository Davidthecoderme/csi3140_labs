<?php
require_once('_config.php');


$d = new Dice();

for ($i = 1; $i <= 5; $i++) {
    echo "ROLL {$i}: {$d->roll()}<br>";
}



echo "<h2>Yatzy Game Rolls</h2>";
$game = new YatzyGame();

for ($i = 1; $i <= 3; $i++) {
    $game->rollDice();
    echo "ROLL {$i}: " . implode(", ", $game->getDiceValues()) . "<br>";
}


echo "<h2>Yatzy Engine Scores</h2>";
echo "Score for ones: " . YatzyEngine::calculateScore($game, 'ones') . "<br>";
echo "Score for twos: " . YatzyEngine::calculateScore($game, 'twos') . "<br>";
echo "Score for threes: " . YatzyEngine::calculateScore($game, 'threes') . "<br>";
echo "Score for fours: " . YatzyEngine::calculateScore($game, 'fours') . "<br>";
echo "Score for fives: " . YatzyEngine::calculateScore($game, 'fives') . "<br>";
echo "Score for sixes: " . YatzyEngine::calculateScore($game, 'sixes') . "<br>";
