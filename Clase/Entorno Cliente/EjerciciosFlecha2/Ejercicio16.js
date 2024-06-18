let numRan = (min, max) => {
    let n;
    if(isNaN(min) || isNaN(max)){
        n = Math.floor((Math.random() * 100) + 1)
    }
    else{
        n = Math.floor((Math.random() * (max - min + 1)) + min)
    }
    return n;
}

let i = 0;
while(i <= 100){
    console.log(numRan(50,80));
    i++
}