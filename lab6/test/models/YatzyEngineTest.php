<?php

namespace Yatzy\Test;

use Yatzy\YatzyGame;
use Yatzy\YatzyEngine;
use PHPUnit\Framework\TestCase;

class YatzyEngineTest extends TestCase
{
    public function testCalculateScore()
    {
        $game = new YatzyGame();

        // Mock the dice values for testing
        $reflection = new \ReflectionClass($game);
        $diceValues = $reflection->getProperty('diceValues');
        $diceValues->setAccessible(true);
        $diceValues->setValue($game, [1, 2, 3, 4, 5]);

        $this->assertEquals(1, YatzyEngine::calculateScore($game, 'ones'));
        $this->assertEquals(2, YatzyEngine::calculateScore($game, 'twos'));
        $this->assertEquals(3, YatzyEngine::calculateScore($game, 'threes'));
        $this->assertEquals(4, YatzyEngine::calculateScore($game, 'fours'));
        $this->assertEquals(5, YatzyEngine::calculateScore($game, 'fives'));
        $this->assertEquals(0, YatzyEngine::calculateScore($game, 'sixes'));
    }
}
