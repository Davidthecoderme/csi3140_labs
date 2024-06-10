
// public/assets/yatzy_game.js

class yatzyGame {
    constructor() {
        this.resetGame();
    }

    resetGame() {
        this.rollNumber = 0;
        this.diceValues = [0, 0, 0, 0, 0];
        this.keepDice = [false, false, false, false, false];
    }

    rollDice() {
        if (this.rollNumber >= 3) {
            console.log("No rolls left for this turn.");
            return;
        }

        for (let i = 0; i < this.diceValues.length; i++) {
            if (!this.keepDice[i]) {
                this.diceValues[i] = rollDie();
            }
        }

        this.rollNumber++;
    }

    toggleKeep(index) {
        if (index >= 0 && index < this.diceValues.length) {
            this.keepDice[index] = !this.keepDice[index];
        }
    }

    getGameState() {
        return {
            rollNumber: this.rollNumber,
            diceValues: this.diceValues,
            keepDice: this.keepDice
        };
    }
}

const game = new yatzyGame();

document.getElementById('rollDiceButton').addEventListener('click', () => {
    game.rollDice();
    const state = game.getGameState();
    document.getElementById('diceResults').innerText = `Roll: ${state.rollNumber}, Dice: ${state.diceValues.join(', ')}, Keep: ${state.keepDice.join(', ')}`;
});
