const texto_random_facil="http://api.quotable.io/random?maxLength=50"

const alertas="//cdn.jsdelivr.net/npm/sweetalert2@11"

window.addEventListener('load', init);

const textoDisplay = document.getElementById('textoDisplay')
const quoteInput = document.getElementById('quoteInput')
//const timer = document.getElementById('timer')
const puntos = document.getElementById('puntaje')
const scoreDisplay = document.getElementById('score');
const timeDisplay = document.getElementById('time');

let time;
let isPlaying;
let executed;
let x=0;
let points=0;

function init() {
  // Call countdown every second
  setInterval(countdown, 1000);
  // Check game status
  setInterval(checkStatus, 50);
}

quoteInput.addEventListener('input', () => {
  const array = textoDisplay.querySelectorAll('span')
  const valor = quoteInput.value.split('')

  isPlaying = true;

  let correct = true
  array.forEach((charSpan, index) => {
    const char = valor[index]
    if (char == null) {
      charSpan.classList.remove('correct')
      charSpan.classList.remove('incorrect')
      correct = false
    } else if (char === charSpan.innerText) {
      charSpan.classList.add('correct')
      charSpan.classList.remove('incorrect')
    } else {
      charSpan.classList.remove('correct')
      charSpan.classList.add('incorrect')
      correct = false;
    }
  })
  
  if (correct){
    points++;
    puntos.innerText=points;
    getNextEz()
  }
})

function getEzQuote(){
    return fetch(texto_random_facil)
        .then(response=>response.json())
        .then(data=>data.content)
}

async function getNextEz(){
    const quote=await getEzQuote()
    textoDisplay.innerHTML=''
    quote.split('').forEach(character=>{
        const charSpan=document.createElement('span')

        charSpan.innerText=character
        textoDisplay.appendChild(charSpan)

    })
    quoteInput.value=null

    //startTimer();
    executed=false;
    startCountdown();

}

let starTime;
/*
function startTimer(){
    timer.innerText=0
    starTime=new Date()
    setInterval(()=>{
        timer.innerText=getTimertime()
    },1000)
}

function getTimertime(){
  return Math.floor((new Date()-starTime)/1000)
}*/

function startCountdown(){
  time=16;
}

function gameOver(){
  executed=true;
  Swal.fire({
    title: 'Game Over!.',
    text: "Do you wish to try again?",
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
    icon: 'info'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href='act0.php'; 
    }else if (result.dismiss === Swal.DismissReason.cancel){
        window.location.href='Funciones/guardaScore.php?score='+puntFinal;
        window.location.href='index.php';
    }
})
}

function stopTimer(){
  startCountdown();
  timeDisplay.innerHTML=time;
}

function countdown() {
  // Make sure time is not run out
  if (time > 0) {
    // Decrement
    time--;
  } else if (time === 0) {
    // Game is over
    isPlaying = false;
  }
  // Show time
  timeDisplay.innerHTML = time;
}

function checkStatus() {
  if (!isPlaying && time === 0){
    if(!executed){
      puntFinal=puntos.innerText;
      gameOver();
    }
  }
}

getNextEz()
