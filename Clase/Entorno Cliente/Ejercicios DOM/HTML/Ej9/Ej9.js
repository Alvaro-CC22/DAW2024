function cuentaCaracteres() {
    
    var texto = document.getElementById("comentarios");
    var maxLong = parseInt(texto.getAttribute("maxlength"));
    var contador = document.getElementById("resultado");

    var longRestante = maxLong - texto.value.length;

    contador.textContent = longRestante;
}