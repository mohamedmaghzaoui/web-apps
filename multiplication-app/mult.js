let phrase=document.getElementById("question")
let answer=document.getElementById("answer")
let randomNumber1 = Math.floor(Math.random() * 11);
let randomNumber2 = Math.floor(Math.random() * 11);
phrase.innerHTML="what is "+randomNumber1+" multiplyed by "+randomNumber2
let btn=document.getElementById("btn")
let scorephrase=document.getElementById("score")
btn.addEventListener("click",play)
let number
let result
let score=0
function play(){

    
    result=randomNumber1*randomNumber2
    number=document.getElementById("answer").value
    if(number==result){
        score++
    }else{
        score--
    }
    scorephrase.innerHTML="score: " + score
    
   
    randomNumber1 = Math.floor(Math.random() * 11);
    randomNumber2 = Math.floor(Math.random() * 11);
    phrase.innerHTML="what is "+randomNumber1+" multiplyed by "+randomNumber2
    
}