
// public/assets/yatzy_game.js

class yatzyGame {
    constructor() {
        this.rollNumber = 0;
        this.diceValues = [0, 0, 0, 0, 0];
        this.keepDice = [false, false, false, false, false];
        this.totalScore = 0;
    }

    resetGame() {
        this.rollNumber = 0;
        this.diceValues = [0, 0, 0, 0, 0];
        this.keepDice = [false, false, false, false, false];
        this.totalScore = 0;
    }

    rollDice() {
        

        for (let i = 0; i < this.diceValues.length; i++) {
            if (!this.keepDice[i]) {
                this.diceValues[i] = rollDie();
                this.totalScore += this.diceValues[i];
            }
        }

        this.rollNumber++;
        
    }

    totalScore() { 
        for (let j = 0; j < this.diceValues.length; j++) { 
            this.totalScore += this.diceValues[j];
        }
        return this.totalScore;
    }

    

    getGameState() {
        return {
            rollNumber: this.rollNumber,
            diceValues: this.diceValues,
            keepDice: this.keepDice
        };
    }
}



