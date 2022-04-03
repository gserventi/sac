// Calcular el total de un nuevo pago cuando el usuario habilita el check de los comprobantes pendientes
function calcularTotal(check, neto) {
    var checkBox = document.getElementById(check);
    var total = document.getElementById("pagoTotal");
    var valor = document.getElementById(neto).innerText;
    if(isNaN(total.value)||(total.value==0)) {tot = 0;} else {tot=parseFloat(total.value);}
    if (checkBox.checked === true) {
        if(parseFloat(valor))
            { tot += parseFloat(valor); }
    }
    else {
        if(parseFloat(valor)&&(total.value!==0))
            { tot -= parseFloat(valor);}
    }
    total.value = tot.toFixed(2);
}
