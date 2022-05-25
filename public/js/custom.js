// Calcular el total de un nuevo pago cuando el usuario habilita el check de los comprobantes pendientes
function calcularTotal(check, neto, montoTotal) {
    let checkBox = document.getElementById(check);
    let total = document.getElementById(montoTotal);
    let valor = document.getElementById(neto).innerText;
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

function proximoNumeroComprobanteVenta(id_punto) {
    let numero_comprobante = document.getElementById("numero_comprobante");
    let punto_de_venta = puntos.find(o => o.id == id_punto);
    let proximo_numero = (parseFloat(punto_de_venta.ultimo_numero) + 1).toString();
    let agregar_ceros = "0".repeat(8 - proximo_numero.length);
    numero_comprobante.value = punto_de_venta.nombre + " " + punto_de_venta.prefijo + " " + agregar_ceros+proximo_numero;
}

function calcularIva21Venta() {
    let iva_21 = document.getElementById('iva_21');
    let gravado = document.getElementById('gravado');
    iva_21.value = (parseFloat(gravado.value) * 0.21).toString();
}

function calcularTotalVenta() {
    let gravado = Number(document.getElementById('gravado').value);
    let no_gravado = Number(document.getElementById('no_gravado').value);
    let iva_21 = Number(document.getElementById('iva_21').value);
    let total = document.getElementById('total');
    total.value = (gravado + no_gravado + iva_21).toString();
}
