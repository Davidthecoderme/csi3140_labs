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
