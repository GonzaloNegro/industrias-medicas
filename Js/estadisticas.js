const gr1 = document.querySelector('.grafica5');
const gr2 = document.querySelector('.grafica5a');
const change = document.querySelector('#change');

change.addEventListener('click', ()=> {
    if(gr1.style.display == "none"){
        gr1.style.display = "flex";
        gr2.style.display = "none";
    }else{
        gr1.style.display = "none";
        gr2.style.display = "flex";
    }
});

/* -------------------------------- */
const gr16 = document.querySelector('.grafica6');
const gr26 = document.querySelector('.grafica6a');
const change2 = document.querySelector('#change2');

change2.addEventListener('click', ()=> {
    if(gr16.style.display == "none"){
        gr16.style.display = "flex";
        gr26.style.display = "none";
    }else{
        gr16.style.display = "none";
        gr26.style.display = "flex";
    }
});

/* -------------------------------- */
const gr17 = document.querySelector('.grafica7');
const gr27 = document.querySelector('.grafica7a');
const change3 = document.querySelector('#change3');

change3.addEventListener('click', ()=> {
    if(gr17.style.display == "none"){
        gr17.style.display = "flex";
        gr27.style.display = "none";
    }else{
        gr17.style.display = "none";
        gr27.style.display = "flex";
    }
});