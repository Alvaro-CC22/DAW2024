let hacerMedia = (array) => {
    let suma = 0;
    let media;
    
    for (let i = 0; i < array.length; i++) {
        suma += array[i];
    }

    media = suma / array.length;
    return media;
}

const a = [1,2,3];
console.log(hacerMedia(a));
