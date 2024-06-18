function resultado() {

    var num1 = parseInt(document.getElementById("valor1").value);
    var num2 = parseInt(document.getElementById("valor2").value);

    var checkboxSuma = document.getElementById("suma");
    var checkboxResta = document.getElementById("resta");

    var p = document.getElementById("resultado");

    if (checkboxSuma.checked && checkboxResta.checked) {

        p.innerHTML = `La suma es ${num1 + num2} - La diferencia es ${num1 - num2}`;
        
    } else if (checkboxResta.checked) {

        p.innerHTML = `La diferencia es ${num1 - num2}`;

    } else if (checkboxSuma.checked) {

        p.innerHTML = `La suma es ${num1 + num2}`;

    }
}