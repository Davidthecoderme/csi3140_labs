
<?php


class YatzyEngine
{
    public static function calculateScore($game, $scoreBox)
    {
        $diceValues = $game->getDiceValues();
        $score = 0;

        switch ($scoreBox) {
            case 'ones':
                $score = array_sum(array_filter($diceValues, fn ($value) => $value === 1));
                break;
            case 'twos':
                $score = array_sum(array_filter($diceValues, fn ($value) => $value === 2));
                break;
            case 'threes':
                $score = array_sum(array_filter($diceValues, fn ($value) => $value === 3));
                break;
            case 'fours':
                $score = array_sum(array_filter($diceValues, fn ($value) => $value === 4));
                break;
            case 'fives':
                $score = array_sum(array_filter($diceValues, fn ($value) => $value === 5));
                break;
            case 'sixes':
                $score = array_sum(array_filter($diceValues, fn ($value) => $value === 6));
                break;
        }

        return $score;
    }

    public static function updateOverallScore($game)
    {
    }
}
