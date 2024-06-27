
<?php



class YatzyGame
{
    private $currentRoll;
    private $diceValues;
    private $keepDice;

    public function __construct()
    {
        $this->currentRoll = 0;
        $this->diceValues = array_fill(0, 5, 0);
        $this->keepDice = array_fill(0, 5, false);
    }

    public function rollDice()
    {
        $this->currentRoll++;

        for ($i = 0; $i < 5; $i++) {
            if (!$this->keepDice[$i]) {
                $this->diceValues[$i] = rand(1, 6);
            }
        }
    }

    public function getDiceValues()
    {
        return $this->diceValues;
    }

    public function getCurrentRoll()
    {
        return $this->currentRoll;
    }

    public function setKeepDice($index, $keep)
    {
        if ($index >= 0 && $index < 5) {
            $this->keepDice[$index] = $keep;
        }
    }

    public function resetGame()
    {
        $this->currentRoll = 0;
        $this->diceValues = array_fill(0, 5, 0);
        $this->keepDice = array_fill(0, 5, false);
    }
}
