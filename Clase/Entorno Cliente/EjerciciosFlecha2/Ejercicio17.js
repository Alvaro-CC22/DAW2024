let generaNum = () => {
    let numerosAleatorios = new Set();

    while (numerosAleatorios.size < 100) {
        let numeroAleatorio = Math.floor(Math.random() * 1000) + 1;
        numerosAleatorios.add(numeroAleatorio);
    }

    return numerosAleatorios;
};

console.log(generaNum());