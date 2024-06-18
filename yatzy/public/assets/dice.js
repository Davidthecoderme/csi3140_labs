
// public/assets/dice.js

function rollDie() {
    return Math.floor(Math.random() * 6) + 1;
}

function rollDice(numberOfDice) {
    let results = [];
    for (let i = 0; i < numberOfDice; i++) {
        results.push(rollDie());
    }
    return results;
}

document.getElementById('rollDiceButton').addEventListener('click', () => {
    let diceResults = rollDice(5);
    document.getElementById('diceResults').innerText = `Dice results: ${diceResults.join(', ')}`;
});
