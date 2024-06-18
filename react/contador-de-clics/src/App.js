import './App.css';
import Boton from './componentes/Boton';
import freeCodeCampLogo from './imagenes/freecodecamp_logo.jpg';

function App() {

  const manejarClic = () => {
    console.log("Clic");
  }

  const reiniciarContador = () => {
    console.log("Reiniciar");
  }

  return (
    <div className="App">
      <div className='freecodecamp-logo-contenedor'>
        <img 
        className='freecodecamp-logo'
        src={freeCodeCampLogo}
        alt='Logo de freeCodeCamp'
        />
      </div>
      <div className='contenedor-principal'>
        <Boton texto='Clic' esBotonDeClic={true} manejarClic={manejarClic}/>
        <Boton texto='Reiniciar' esBotonDeClic={false} manejarClic={reiniciarContador}/>
      </div>
    </div>
  );
}

export default App;
