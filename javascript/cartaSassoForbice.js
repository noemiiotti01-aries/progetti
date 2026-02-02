const buttons = document.querySelectorAll("button");

const resultEl = document.getElementById("risultato");

const playerScoreEl = document.getElementById("user-punteggio");

const computerScoreEl = document.getElementById("computer-punteggio");

let playerScore = 0;
let computerScore = 0;

buttons.forEach((button) => {
  button.addEventListener("click", () => {
    const result = playRound(button.id, computerPlay());
    resultEl.textContent = result;
    
  });
});

function computerPlay() {
    const choices = ["sasso", "carta", "forbice"];
  const randomChoice = Math.floor(Math.random() * choices.length);
  return choices[randomChoice];
}

function playRound(playerSelection, computerSelection) {
  if (playerSelection === computerSelection) {
    return "pareggio!";
  } else if (
    (playerSelection === "sasso" && computerSelection === "forbice") ||
    (playerSelection === "carta" && computerSelection === "sasso") ||
    (playerSelection === "forbice" && computerSelection === "carta")
  ) {
    playerScore++;
    playerScoreEl.textContent = playerScore;
    return "Hai vinto! " + playerSelection + " batte " + computerSelection;
  } else {
    computerScore++;
    computerScoreEl.textContent = computerScore;
    return "Hai perso! " + computerSelection + " batte " + playerSelection;
  }
}