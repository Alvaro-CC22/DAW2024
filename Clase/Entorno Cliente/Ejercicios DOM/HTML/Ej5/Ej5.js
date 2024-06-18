function enviarSaludo() {
    var nombre = document.getElementById("nombre").value;

    var apellido = document.getElementById("apellido").value;

    var saludo = document.getElementById("saludo");

    saludo.innerHTML = `Hola ${nombre} ${apellido}, gracias por rellenar el formulario`;
}