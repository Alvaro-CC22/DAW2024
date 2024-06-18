const calcularLetraDNI = (dni) => {

    if (dni.length !== 8 || isNaN(dni)) {
        return "Comprueba que el DNI tenga 8 dígitos y no contenga caracteres o que no esté vacío";
    }

    const letrasDNI = 'TRWAGMYFPDXBNJZSQVHLCKE';
    const indice = dni % 23;

    return letrasDNI.charAt(indice);
};

console.log("La letra del DNI será:", calcularLetraDNI("12345678"));
console.log("La letra del DNI será:", calcularLetraDNI("1346325476742"));
console.log("La letra del DNI será:", calcularLetraDNI("1234567X"));
console.log("La letra del DNI será:", calcularLetraDNI(""));