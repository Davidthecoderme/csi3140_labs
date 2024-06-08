let pacmanIndex;
let ghostIndex;
let fruitIndex;
let score = 0;
let n = 10;
let game;
let gameContinue = true;
let numPellets;



function createGame(n) { 

    const mySet = new Set();

    
    
    while (mySet.size < 3) { 
        mySet.add(Math.floor(Math.random()*(n-1)))
    }

    const myArray = [...mySet];

    [pacmanIndex, fruitIndex, ghostIndex] = myArray;
    

    let gameMap = new Array(n);

    for (let i = 0; i < gameMap.length; i++) { 
        if (i === pacmanIndex) {
            gameMap[i] = "C";
        } else if (i === ghostIndex) {
            gameMap[i] = "^";
        } else if (i === fruitIndex) {
            gameMap[i] = "@";
         }else { 
            gameMap[i] = ".";
        }
    }

    numPellets = n - 2;
    return gameMap;

}

// function moveToNextLevel(game) { 
//     return (game[-1] !== '.' && game.indexOf(".") === -1);
// }

function moveLeft(game) { 
    
    game[pacmanIndex] = "";

    if (pacmanIndex == 0){
        pacmanIndex = game.length-1;
    } else {
        pacmanIndex = pacmanIndex - 1;
    }
    
    game[pacmanIndex] = "C.";

    

    //console.log("the index of pacman is :" + pacmanIndex);
    //console.log(game);

    // if (moveToNextLevel(game)) { 
    //     createGame(n);
    // }

}

function moveRight(game) { 
    game[pacmanIndex] = "";

    if (pacmanIndex === game.length-1){
        pacmanIndex = 0;
    } else {
        pacmanIndex = pacmanIndex + 1;
    }
    
    game[pacmanIndex] = "C.";
}

function process_move() { 
    if (pacmanIndex === ghostIndex) { 
        gameContinue = false;
        console.log("you lost the game")
    };
    if (pacmanIndex === fruitIndex) { 
        score += 5;

    }
    if (game[pacmanIndex].includes('.')) { 
        score++; 
        numPellets--;
    }

    if (numPellets === 0) { 
        createGame(n);
        console.log("next level");
    }


}

function moveGhost(game) {
    let ghostIndex = game.findIndex(element => element.includes("^"));
    if (ghostIndex === -1) return game; 

    // Determine the new position for the ghost
    let direction = Math.random() < 0.5 ? -1 : 1;
    let newGhostIndex = ghostIndex + direction;

 
    if (newGhostIndex >= 0 && newGhostIndex < game.length && game[newGhostIndex] !== "C") {
 
        game[ghostIndex] = game[ghostIndex].replace("^", "");
        game[newGhostIndex] += "^";
    }

    return game;
} 


    game = createGame(10);
// Move the ghost every 2 seconds
setInterval(() => {
    game = moveGhost(game);
}, 2000);



// game = createGame(10);
// console.log(game);
// for (let i = 0; i < 10; i++) { 
//     moveLeft(game);
//     console.log(i, game);
// }


