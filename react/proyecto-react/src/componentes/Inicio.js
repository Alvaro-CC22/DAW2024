import React, { useEffect } from 'react';
import '../hojas_de_estilos/Inicio.css';

const Inicio = () => {

  useEffect(() => {
    document.body.style.paddingTop = '50px';
    return () => {
      document.body.style.paddingTop = '0';
    };
  }, []);

  return (
    <body className='fondoInicio'>
    <div className="inicio-container ">
      <div className='col-12 col-md-4 bg-azulgris'>
      <h1>Bienvenido a nuestro sitio web</h1>
      <p>¡Explora nuestras características y servicios!</p>
      <div className="feature-section">
        <h2>Requisitos a cumplir</h2>
        <ul>
            <li><strong>Registro de usuarios e inicio de sesión</strong></li>
            <li><strong>Información</strong></li>
            <li><strong>Responsive</strong></li>
            <li><strong>Carrousel de imágenes</strong></li>
            <li><strong>Calculadora</strong></li>
        </ul>
      </div>
      </div>
    </div>
    </body>
  );
};

export default Inicio;