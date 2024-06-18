function corregir(){

    var email = document.getElementById("email").value;
    var url = document.getElementById("url").value;

    var r1 = document.getElementById("resultado1");
    var r2 = document.getElementById("resultado2");

    var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var regexUrl = /^(https?:\/\/www\.)?[a-zA-Z0-9-]+\.[a-zA-Z]{2,}(\/[a-zA-Z0-9-._~:/?#[\]@!$&'()*+,;=%]*)?$/

    if (regexCorreo.test(email)) {
        r1.innerHTML = "correcto";
    } else {
        r1.innerHTML = "incorrecto";
    }

    if (regexUrl.test(url)) {
        r2.innerHTML = "correcto";
    } else {
        r2.innerHTML = "incorrecto";
    }
}