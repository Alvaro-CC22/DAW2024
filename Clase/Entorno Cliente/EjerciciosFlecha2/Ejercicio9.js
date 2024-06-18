let numerosPares = [];

let i = 2;
while (numerosPares.length < 20) {
    if (i % 2 === 0) {
        numerosPares.push(i);
    }
    i++;
}

console.log(numerosPares);