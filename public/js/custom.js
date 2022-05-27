// Calcular el total de un nuevo pago cuando el usuario habilita el check de los comprobantes pendientes
function calcularTotal(check, neto, montoTotal) {
    let checkBox = document.getElementById(check);
    let total = document.getElementById(montoTotal);
    let valor = document.getElementById(neto).innerText;
    let tot;
    if(isNaN(total.value)||(total.value==0)) {tot = 0;} else {tot=parseFloat(total.value);}
    if (checkBox.checked === true) {
        if (parseFloat(valor)) {
            tot += parseFloat(valor);
        }
    } else {
        if (parseFloat(valor) && (total.value !== 0)) {
            tot -= parseFloat(valor);
        }
    }
    total.value = tot.toFixed(2);
}

function proximoNumeroComprobanteVenta(id_punto,puntos) {
    let numero_comprobante = document.getElementById("numero_comprobante");
    let punto_de_venta = puntos.find(o => o.id == id_punto);
    let proximo_numero = (parseFloat(punto_de_venta.ultimo_numero) + 1).toString();
    let agregar_ceros = "0".repeat(8 - proximo_numero.length);
    numero_comprobante.value = punto_de_venta.nombre + " " + punto_de_venta.prefijo + " " + agregar_ceros+proximo_numero;
}

function completarTipoComprobanteDefault(id_proveedor, proveedores) {
    let tipo_comprobante = document.getElementById('id_tipo_comprobante');
    let proveedor = proveedores.find(p => p.id == id_proveedor);
    if (tipo_comprobante.selectedIndex == 0 ){
        tipo_comprobante.selectedIndex = proveedor.id_tipo_comprobante;
    }
}

function completarFormaDePagoDefault(id_proveedor, proveedores) {
    let forma_de_pago = document.getElementById('id_forma_de_pago');
    let proveedor = proveedores.find(p => p.id == id_proveedor);
    if (forma_de_pago.selectedIndex == 0) {
        forma_de_pago.selectedIndex = proveedor.id_forma_de_pago_default;
    }
}

function calcularTasa(base, tasa, porcentaje) {
    let valor_base = document.getElementById(base);
    let valor_tasa = document.getElementById(tasa);
    valor_tasa.value = (Number(valor_base.value) * porcentaje).toString();
}

function calcularTotalVenta() {
    let gravado = Number(document.getElementById('gravado').value);
    let no_gravado = Number(document.getElementById('no_gravado').value);
    let iva_21 = Number(document.getElementById('iva_21').value);
    let total = document.getElementById('total');
    total.value = (gravado + no_gravado + iva_21).toString();
}

function calcularTotalCompra() {
    let gravado = Number(document.getElementById('gravado').value);
    let no_gravado = Number(document.getElementById('no_gravado').value);
    let exento = Number(document.getElementById('exento').value);
    let iva_21 = Number(document.getElementById('iva_21').value);
    let iva_27 = Number(document.getElementById('iva_27').value);
    let iva_105 = Number(document.getElementById('iva_105').value);
    let percepcion_iva_RG3337_3 = Number(document.getElementById('percepcion_iva_RG3337_3').value);
    let percepcion_iva_RG3337_105 = Number(document.getElementById('percepcion_iva_RG3337_105').value);
    let percepcion_iibb_caba_15 = Number(document.getElementById('percepcion_iibb_caba_15').value);
    let percepcion_iibb_ba_01 = Number(document.getElementById('percepcion_iibb_ba_01').value);
    let neto = document.getElementById('neto');
    neto.value = (
        gravado + no_gravado + exento +
        iva_21 + iva_27 + iva_105 +
        percepcion_iva_RG3337_3 + percepcion_iva_RG3337_105 + percepcion_iibb_caba_15 + percepcion_iibb_ba_01
    ).toString();
}


