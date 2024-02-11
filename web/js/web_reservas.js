var ifecha = document.getElementById('fecha');

var modalConf;
var modalCanc;

ifecha.addEventListener('input', function() {
    fetch('index.php?accion=obtener_tramos&fecha=' + this.value)
    .then(response => response.json())
    .then(horas => {
        var existeTabla = document.querySelector('table');
        var fecha = this.value;

        if (existeTabla != null) {
            existeTabla.remove();
        }

        var tabla = document.createElement('table');
        tabla.classList.add('table', 'table-borderless');
        var thead = document.createElement('thead');
        var trthead = thead.insertRow();
        var tdthead = trthead.insertCell(0);
        tdthead.classList.add('table-dark');
        tdthead.style.borderRadius = '25px';
        tdthead.style.height = '110px';
        tdthead.style.textAlign = 'center';
        tdthead.colSpan = '2';
        tdthead.setAttribute('valign', 'middle');
        tdthead.style.backgroundColor = 'orange';
        tdthead.innerHTML = 'HORAS';
        tdthead.style.fontSize = '40px';
        tdthead.style.color = 'black';
        tdthead.style.border = '2px solid white';
        tdthead.style.boxShadow = '2px 2px 10px #000';
        var tbody = document.createElement('tbody');
        tabla.appendChild(thead);
        tabla.appendChild(tbody);

        for (const [i, hora] of horas.entries()) {
            if (i % 2 == 0) {
                var fila = tbody.insertRow();
                var celdaHora = fila.insertCell(0);
            } else {
                var celdaHora = fila.insertCell(-1);
            }

            celdaHora.style.borderRadius = '25px';
            celdaHora.style.height = '110px';
            celdaHora.style.borderBottom = '40px';
            celdaHora.style.fontSize = '30px';
            celdaHora.style.textAlign = 'center';
            celdaHora.style.border = '2px solid white';
            celdaHora.style.boxShadow = '2px 2px 10px #000';
            celdaHora.setAttribute('valign', 'middle');

            if (i == 6) {
                celdaHora.colSpan = '2';
            }

            if (hora.includes(':azul') || hora.includes(':rojo')) {
                var horaSpliter = hora.split(':');
                var horaSeparada = horaSpliter[0] + ':' + horaSpliter[1];

                if (horaSpliter[2] == 'rojo') {
                    celdaHora.classList.add('bg-danger');
                } else {
                    celdaHora.classList.add('bg-primary');
                    celdaHora.style.fontWeight = '900';
                    aniadirEventoCancelar(celdaHora, horaSeparada, fecha);
                }

                celdaHora.textContent = horaSeparada;
            } else {
                aniadirEventoConfirmar(celdaHora, hora, fecha);
                celdaHora.classList.add('table-dark');
                celdaHora.textContent = hora;
            }

            tabla.style.width = '35%';
            tabla.style.margin = 'auto';
            tabla.style.marginTop = '25px';
            tabla.style.borderCollapse = 'separate';
            tabla.getElementsByTagName('tbody')[0].appendChild(fila);
        }

        tabla.style.borderSpacing = '25px';
        document.querySelector('body').appendChild(tabla);
    })
    .catch(error => console.log(error))
});

var botonConfirmarReserva = document.getElementById('confirmar-reserva');
botonConfirmarReserva.addEventListener('click', function() {
    var pulsado = document.querySelector('.pulsadoConf');
    var horaPulsada = pulsado.getAttribute('data-hora');
    var fechaPulsada = pulsado.getAttribute('data-fecha');
    crearReserva(pulsado, fechaPulsada, horaPulsada);
});

var botonCancelarReserva = document.getElementById('cancelar-reserva');
botonCancelarReserva.addEventListener('click', function() {
    var pulsado = document.querySelector('.pulsadoCanc');
    var horaPulsada = pulsado.getAttribute('data-hora');
    var fechaPulsada = pulsado.getAttribute('data-fecha');
    cancelarReserva(pulsado, fechaPulsada, horaPulsada);
});

var botonCancelarReservaConfMod = document.getElementById('mod-cancelar-conf');
botonCancelarReservaConfMod.addEventListener('click', function() {
    var celda = document.querySelector('.pulsadoConf');
    var hora = celda.getAttribute('data-hora');
    var fecha = celda.getAttribute('data-fecha');
    aniadirEventoConfirmar(celda, hora, fecha)
});

var botonCancelarReservaCancMod = document.getElementById('mod-cancelar-canc');
botonCancelarReservaCancMod.addEventListener('click', function() {
    var celda = document.querySelector('.pulsadoCanc');
    var hora = celda.getAttribute('data-hora');
    var fecha = celda.getAttribute('data-fecha');
    aniadirEventoCancelar(celda, hora, fecha)
});

function crearReserva(pulsado, fecha, hora) {
    fetch('index.php?accion=insertar_reserva&fecha=' + fecha + '&hora=' + hora)
    .then(response => response.json())
    .then(data => {
        var celdas = document.querySelectorAll('td');

        for (const celda of celdas) {
            if (celda.textContent === data.hora) {
                celda.classList.add('bg-primary');
                celda.style.color = 'black';
                celda.style.fontWeight = '900';
                pulsado.classList.remove('pulsadoConf');
                aniadirEventoCancelar(celda, data.hora, data.fecha);
            }
        }
    })
    .catch(error => console.log(error))
    .finally( function() {
        modalConf.hide();
    })
}

function cancelarReserva(pulsado, fecha, hora) {
    fetch('index.php?accion=cancelar_reserva&fecha=' + fecha + '&hora=' + hora)
    .then(response => response.json())
    .then(data => {
        var celdas = document.querySelectorAll('td');

        for (const celda of celdas) {
            if (celda.textContent === data.hora) {
                celda.classList.remove('bg-primary');
                celda.style.color = 'white';
                celda.style.fontWeight = 'normal';
                celda.classList.add('table-dark');
                pulsado.classList.remove('pulsadoCanc');
                aniadirEventoConfirmar(celda, data.hora, data.fecha);
            }
        }
    })
    .catch(error => console.log(error))
    .finally( function() {
        modalCanc.hide();
    })
}

function aniadirEventoConfirmar(celda, hora, fecha) {
    celda.addEventListener('click', function() {
        modalConf = new bootstrap.Modal('#confirmarReserva', {
            keyboard: false
        });
        celda.setAttribute('data-hora', hora);
        celda.setAttribute('data-fecha', fecha);
        celda.classList.add('pulsadoConf');
        modalConf.show();
    }, { once: true });
}

function aniadirEventoCancelar(celda, hora, fecha) {
    celda.addEventListener('click', function() {
        modalCanc = new bootstrap.Modal('#cancelarReserva', {
            keyboard: false
        });
        celda.setAttribute('data-hora', hora);
        celda.setAttribute('data-fecha', fecha);
        celda.classList.add('pulsadoCanc');
        modalCanc.show();
    }, { once: true });
}

document.addEventListener('DOMContentLoaded', function() {
    var fecha = new Date();
    var dia = fecha.getDate().toString().padStart(2, '0');
    var mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
    var ano = fecha.getFullYear();
    document.getElementById('fecha').min = `${ano}-${mes}-${dia}`;
});