
function revisarSables(){
    let sablesDeLuz=[-1,-5,9,8,7,-8]
    let filtroSables=sablesDeLuz.filter(function(sable){
        return(sable<0)
    })
   console.log('Sables con energia negativa '+ filtroSables.length)
}
revisarSables()