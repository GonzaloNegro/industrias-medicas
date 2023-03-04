/* CONTADOR DE ELEMENTOS INGRESADOS EN NUEVOS PRODUCTOS */

let formcot = document.querySelector('#formcot');
let btncot = document.querySelector("#btncot");
let valor = document.querySelector("#valor");

let prod = document.querySelector("#prod").value;
let cant = document.querySelector("#cant").value;

function validar2(){
    let desabilitar = false;

    if(formcot.prod.value == ""){
        desabilitar = true;
    }

    if(formcot.cant.value == ""){
        desabilitar = true;
    }
    if(desabilitar == true){
/*         btncot.disabled = true;
        btncot.style.backgroundColor="grey"; */
        valor.innerHTML = 1;
    }else{
/*         btncot.disabled = false;
        btncot.style.backgroundColor="crimson"; */
        valor.innerHTML = 8;
    }
}
formcot.addEventListener("keyup", validar2);

/* btncot.style.backgroundColor="grey"; */



const restar = document.querySelector('#menos');
const sumar = document.querySelector('#adicional');
const contador = document.querySelector('#contar');

let numero = 1;

/* sumar.addEventListener("click", ()=>{
    numero++;
    contador.innerHTML = "Cantidad de productos: "+numero;
});

restar.addEventListener("click", ()=>{
    if(numero == 0){
    }else{
        numero--;
        contador.innerHTML = "Cantidad de productos: "+numero;
    }
}); */
/* if(contador.value == 1){
    contador.style.display = "none";
}else{
    contador.style.display = "block";
} */