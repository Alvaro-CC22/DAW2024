let serieFibonacci = () => {
    let arrayFibonacci = [0,1]

    for (let i = 2; i < 10; i++){
        arrayFibonacci[i] = arrayFibonacci[i - 1] + arrayFibonacci[i -2];
        console.log(arrayFibonacci)
    }

    return arrayFibonacci;
}

console.log(serieFibonacci());