// function filtrarPlanos(planos, arrancarNave){
   
//     let filtro= planos.filter(function(plano){
//          return(plano>=1 && plano<=10)
 
//      })
//      arrancarNave(filtro)
//  }
//  let planos=[1,100,200,400,500]
//  filtrarPlanos(planos, function(filtro){
//      let cuenta=filtro.length
     
 
//      if(cuenta>0){
//          console.log('Arrancando la nave')
//      }else{
//          console.log('Buscando planos')
//      }
    
//  })


let filtrarPlanos = (planos) => {
    let filtroPlanos = planos.filter(plano => plano >= 1 && plano <= 10)

if(filtroPlanos.length > 0){
    return 'Arrancando la nave.'
}
else{
    return 'Buscando planos.'
}
}

let planos = [1,100,200,400,500]

console.log(filtrarPlanos(planos))