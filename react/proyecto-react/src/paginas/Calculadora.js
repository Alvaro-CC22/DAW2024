import '../hojas_de_estilos/Boton.css';
import '../hojas_de_estilos/BotonClear.css';
import '../hojas_de_estilos/Pantalla.css';
import FA14 from '../imagenes/FA14.jpg';
import LH44 from '../imagenes/LH44.jpg';
import MV1 from '../imagenes/MV1.jpg';
import Boton from '../componentes/Boton';
import Pantalla from '../componentes/Pantalla';
import BotonClear from '../componentes/Clear';
import { Carousel } from 'react-bootstrap';
import { useState } from 'react';
import React, { useEffect } from 'react';
import { evaluate } from 'mathjs';

function Calculadora() {
  
  useEffect(() => {
    document.body.style.paddingTop = '50px';
    return () => {
      document.body.style.paddingTop = '0';
    };
  }, []);

  const [input, setInput] = useState('');

  const agregarInput = val => {
    setInput(input + val);
  };

  const calcularResultado = () => {
    if (input) {
      setInput(evaluate(input));
    } else {
      alert("Por favor ingrese valores para realizar los cálculos.");
    }
  };

  return (
    <div className="row justify-content-center"> 
    <div className='col-12 col-lg-6'>
    <div className='Calculadora'>
      <div className='contenedor-calculadora'>
        <Pantalla input={input}/>
        <div className='fila'>
          <Boton manejarClic={agregarInput}>1</Boton>
          <Boton manejarClic={agregarInput}>2</Boton>
          <Boton manejarClic={agregarInput}>3</Boton>
          <Boton manejarClic={agregarInput}>+</Boton>
        </div>
        <div className='fila'>
          <Boton manejarClic={agregarInput}>4</Boton>
          <Boton manejarClic={agregarInput}>5</Boton>
          <Boton manejarClic={agregarInput}>6</Boton>
          <Boton manejarClic={agregarInput}>-</Boton>
        </div>
        <div className='fila'>
          <Boton manejarClic={agregarInput}>7</Boton>
          <Boton manejarClic={agregarInput}>8</Boton>
          <Boton manejarClic={agregarInput}>9</Boton>
          <Boton manejarClic={agregarInput}>*</Boton>
        </div>
        <div className='fila'>
          <Boton manejarClic={calcularResultado}>=</Boton>
          <Boton manejarClic={agregarInput}>0</Boton>
          <Boton manejarClic={agregarInput}>.</Boton>
          <Boton manejarClic={agregarInput}>/</Boton>
        </div>
        <div className='fila'>
          <BotonClear manejarClear={() => setInput('')}>
            Clear
          </BotonClear>
        </div>
      </div>
    </div>
    </div>
        <div className="col-12 col-lg-6"> 
          <Carousel>
            <Carousel.Item>
              <img
                className="d-block w-100 carousel-img"
                src={FA14}
                alt="Foto de Fernando Alonso"
              />
              <Carousel.Caption className='bg-secondary'>
                <h3>Fernando Alonso</h3>
                <p className='text-white'>Bicampeón mundial de Fórmula 1</p>
              </Carousel.Caption>
            </Carousel.Item>
            <Carousel.Item>
              <img
                className="d-block w-100 carousel-img"
                src={LH44}
                alt="Foto de Lewis Hamilton"
              />
              <Carousel.Caption className='bg-secondary'>
                <h3>Lewis Hamilton</h3>
                <p className='text-white'>Heptacampeón mundial de Fórmula 1</p>
              </Carousel.Caption>
            </Carousel.Item>
            <Carousel.Item>
              <img
                className="d-block w-100 carousel-img"
                src={MV1}
                alt="Foto de Max Verstappen"
              />
              <Carousel.Caption className='bg-secondary'>
                <h3>Max Verstappen</h3>
                <p className='text-white'>Tricampeón mundial de Fórmula 1</p>
              </Carousel.Caption>
            </Carousel.Item>
          </Carousel>
        </div>
    

    
    </div>
  );
}

export default Calculadora;