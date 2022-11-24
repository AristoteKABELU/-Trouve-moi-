let b1 = document.getElementById("b1");
let b2 = document.getElementById("b2");
let b3 = document.getElementById("b3");
let b4 = document.getElementById("b4");
let parent = document.getElementById("parent");
let start = document.getElementById("start");
let reset = document.getElementById("reset");
let title = document.querySelector('.titre');
let child = null;
let interval = null;
let timeout = null;
let score = 0;
let stat = null;
let nom = 'kabelu'


function round_color()
{
    b1.style.backgroundColor = "#" + Math.random().toString().slice(6,12);    
    b2.style.backgroundColor = "#" + Math.random().toString().slice(6,12);    
    b3.style.backgroundColor = "#" + Math.random().toString().slice(6,12);    
    b4.style.backgroundColor = "#" + Math.random().toString().slice(6,12);

    b1.innerText = "Trouve moi";
    b2.innerText = "Trouve moi";
    b3.innerText = "Trouve moi";
    b4.innerText = "Trouve moi";

    child =Math.floor(Math.random()*4);
    parent.children.item(child).innerText = "Gagnant";
}

function endGame(){
        b1.style.color = "black";
        b2.style.color = "black";
        b3.style.color = "black";
        b4.style.color = "black"
}

start.addEventListener('click', function () {
    if (!interval) {
        interval = setInterval(round_color, 500);
    }

    if (!timeout) {
        clearTimeout(timeout);
    }

    parent.addEventListener('click', function (e) {
        e.preventDefault();
        if(e.target.innerText == "Gagnant")
        {
            endGame();
            score = 1;
            stat = "gagné :)"
        }
        else
        {
            endGame();
            score = 0;
            stat = "perdu :(";
        }
        window.location.href = "./index.php?score=" + score +"&stat=" + stat;
    });

    timeout = setTimeout(function () {
        clearInterval(interval);
        b1.style.backgroundColor = "black";
        b2.style.backgroundColor = "black";
        b3.style.backgroundColor = "black";
        b4.style.backgroundColor = "black";
        b1.style.color = "black";
        b2.style.color = "black";
        b3.style.color = "black";
        b4.style.color = "black";
        // b1.innerText = "1";
        // b2.innerText = "2";
        // b3.innerText = "3";
        // b4.innerText = "4";
    }, 2 * 2000);


});

