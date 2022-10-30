// visibilidad del formulario final
function determinarVistaTipoForm(service) {
    if (service == 0) {
        this.ocultarFormularios();
    } else {
        if (service == 1) {
            this.ocultarFormularioServicio2();
            this.mostrarFormularioServicio1();
        } else {
            this.ocultarFormularioServicio1();
            this.mostrarFormularioServicio2();
        }
    }
}

// visibilidad del formulario de servicios tipo 1
function mostrarFormularioServicio1() {
    let element = document.getElementById("info_serv_1");
    let hidden = element.getAttribute("hidden");
    element.removeAttribute("hidden");
}

function ocultarFormularioServicio1() {
    let element2 = document.getElementById("info_serv_1");
    element2.setAttribute("hidden", "hidden");
}

// visibilidad del formulario de servicios tipo 2
function mostrarFormularioServicio2() {
    let element = document.getElementById("info_serv_2");
    let hidden = element.getAttribute("hidden");
    element.removeAttribute("hidden");
}

function ocultarFormularioServicio2() {
    let element1 = document.getElementById("info_serv_2");
    element1.setAttribute("hidden", "hidden");
}

// Oculta los formularios cuando no se ha seleccionado el servicio.
function ocultarFormularios() {
    let element1 = document.getElementById("info_serv_1");
    element1.setAttribute("hidden", "hidden");

    let element2 = document.getElementById("info_serv_2");
    element2.setAttribute("hidden", "hidden");
}

function abrirNuevaPestaña(url) {
    // Abrir nuevo tab
    const win = window.open(url, '_blank');
    // Cambiar el foco al nuevo tab (punto opcional)
    win.focus();
}

// Evita que la fecha de los input date sean menor a la actual
this.ocultarFormularios(); // Oculta los formularios hasta que se ecoja el servicio y tipos deseados
