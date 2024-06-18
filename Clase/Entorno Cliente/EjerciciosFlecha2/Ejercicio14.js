let calculaPrecio = (precio, iva) =>{
    let precioTotal;
    if(isNaN(iva)){
        precioTotal = precio + (precio * 0.21);
    }
    else{
        ivaSimple = iva / 100
        precioTotal = precio + (precio * ivaSimple);
    }

    return precioTotal;
}

console.log(calculaPrecio(100));
console.log(calculaPrecio(100,10));