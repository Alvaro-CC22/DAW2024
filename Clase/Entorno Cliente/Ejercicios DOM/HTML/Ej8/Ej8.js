function resultado() {

    var num1 = parseInt(document.getElementById("valor1").value);
    var num2 = parseInt(document.getElementById("valor2").value);

    var select = document.getElementById("operacion");
    var valorSelect = select.value;

    var p = document.getElementById("resultado1");

    if (valorSelect === "resta") {

        p.innerHTML = `La diferencia es ${num1 - num2}`;

    } else {

        p.innerHTML = `La suma es ${num1 + num2}`;
    }
}

function resultadoMultiopcion() {

    var num1 = parseInt(document.getElementById("valor1").value);
    var num2 = parseInt(document.getElementById("valor2").value);

    var select = document.getElementById("operaciones");
    var opciones = select.options;
    var valoresElegidos = [];

    var p = document.getElementById("resultado2");

    for (var i = 0; i < opciones.length; i++) {

        if (opciones[i].selected) {

            valoresElegidos.push(opciones[i].value);

        }
    }

    if(valoresElegidos.includes("suma") && valoresElegidos.includes("resta")){

        p.innerHTML = `La suma es ${num1 + num2} - La diferencia es ${num1 - num2}`;

    }else if(valoresElegidos.includes("suma")){

        p.innerHTML = `La suma es ${num1 + num2}`;

    }else{

        p.innerHTML = `La diferencia es ${num1 - num2}`;
        
    }


}