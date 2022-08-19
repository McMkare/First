let cards = []  //ordered list of items
let sum = 0
let hasBlackjack = false
let isAlive = false
let message = ""

 //store the message=el to a new variable called messageEL
let messageEl = document.getElementById("message-el")

 //storing the sum paragraph in a variable called sumEl
 let sumEl = document.getElementById("sum-el")

  //storing the card element in a DOM variable using querySelector which works the same as getElementById
  let cardEl = document.querySelector("#card-el")

   //generate random numbers function
function getRandomCard() {
    let number = Math.floor(Math.random() * 13) + 1
    if (number > 10) {
        return 10
    } else if(number === 1) {
        return 11
    } else {
        return number
    }
}
 // function to declare the variables, array and the sum of the variable/ initialize and start the game
function startGame() {
    isAlive = true
    let firstCard = getRandomCard()
    let secondCard = getRandomCard()
    cards = [firstCard, secondCard]
    sum = firstCard + secondCard
    
    renderGame()
}
 //function to initiate the game 
function renderGame() {
     //initializing/ render the first and second card the card element and the sum variable
     cardEl.textContent = "Cards: "  //+ cards[0] + " " + cards[1]
      //render out all the cards we have
      for (let i = 0; i < cards.length; i++) {
        cardEl.textContent += cards[i] + " "
      }
     sumEl.textContent = "Sum: " + sum
    if (sum <= 20) {
        message = "Do you want to draw a new card?"
    } else if (sum === 21) {
        message = " You've got Blackjack!"
        hasBlackjack = true
    } else {
        message = "You're out of the game!"
        isAlive - false
    }
     //function statement to display the message on the AppGame
   messageEl.textContent = message
}

 //fucntion to draw new Crad from the dake

function newCard() {
    let card = getRandomCard()
    if (isAlive === true && hasBlackjack === false) {
        return card
    }

    sum += card
    cards.push(card)
     //console.log(cards)
    renderGame()
    
}