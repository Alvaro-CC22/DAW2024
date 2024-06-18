let decimalABinario = (num) => {
    if (num < 0 || !Number.isInteger(num)) {
        return "El número debe ser un número positivo.";
    }

    if (num === 0) {
        return "0";
    }

    let bin = "";
    while (num > 0) {
        let resto = num % 2;
        bin = resto + bin;
        num = Math.floor(num / 2);
    }

    return bin;
}

console.log(decimalABinario(43));
console.log(decimalABinario(266));
console.log(decimalABinario(153));