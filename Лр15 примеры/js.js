function countRabbits(){
    for(let i=1;i<=3;i++){
        alert("Кролик номер "+i);
    }
}

elem.onclick=function(){
    alert('Спасибо');
}

function handler1(){
    alert('Спасибо');
};
function handler2(){
    alert('Спасибо еще раз');
}
elem2.onclick=()=>alert("Привет");
elem2.addEventListener("click",handler1);
elem2.addEventListener("click",handler2);

function handler() {
    alert('Спасибо!');
    }
    input.addEventListener("click", handler);
    input.removeEventListener("click", handler);