let b1 = document.getElementById("b1");
let b2 = document.getElementById("b2");
let b3 = document.getElementById("b3");
let b4 = document.getElementById("b4");
let parent = document.getElementById("parent");
let start = document.getElementById("start");
let reset = document.getElementById("reset");
let title = document.querySelector('.titre');
let find_me = document.getElementsByClassName('trouve');
let child = null;
let interval = null;
let timeout = null;
let score = 0; 


function round_color()
{
    b1.style.backgroundColor = "#" + Math.random().toString().slice(6,12);    
    b2.style.backgroundColor = "#" + Math.random().toString().slice(6,12);    
    b3.style.backgroundColor = "#" + Math.random().toString().slice(6,12);    
    b4.style.backgroundColor = "#" + Math.random().toString().slice(6,12);

    b1.innerHTML = "<p class='trouve'>Trouve moi</p>";
    b2.innerHTML = "<p class='trouve'>Trouve moi</p>";
    b3.innerHTML = "<p class='trouve'>Trouve moi</p>";
    b4.innerHTML = "<p class='trouve'>Trouve moi</p>";

    child =Math.floor(Math.random()*4);
    parent.children.item(child).innerHTML = "<p class='trouve'> Gagnant </p>";
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
        if(e.target.innerText == "Gagnant"){
            score = 1;
        }else{
            score = 0; }

        window.location.href = "./index.php?score=" + score;
    });

    timeout = setTimeout(function () {

        clearInterval(interval);
        b1.style.backgroundColor = "black";
        b2.style.backgroundColor = "black";
        b3.style.backgroundColor = "black";
        b4.style.backgroundColor = "black";

        for(let i = 0; i<find_me.length ; i++){
            find_me[i].style.opacity = "0";
        }
        


    }, 2 * 2000);

});

