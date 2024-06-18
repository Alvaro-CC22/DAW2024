import '../hojas_de_estilos/Login.css';
import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';

function InicioSesion() {
  useEffect(() => {
    document.body.style.paddingTop = '50px';
    return () => {
      document.body.style.paddingTop = '0';
    };
  }, []);

  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  useEffect(() => {
    const usuarioLogueado = sessionStorage.getItem('usuarioLogueado');
    if (usuarioLogueado) {
      navigate('/');
    }
  }, [navigate]);

  const handleLogin = (event) => {
    event.preventDefault();

    fetch('http://localhost:3001/usuarios')
      .then((response) => response.json())
      .then((data) => {
        const usuarioEncontrado = data.find(
          (usuario) => usuario.email === email && usuario.password === password
        );

        if (usuarioEncontrado) {
          alert('¡Inicio de sesión exitoso!');
          
          sessionStorage.setItem('usuarioLogueado', JSON.stringify(usuarioEncontrado));
          navigate('/'); 
        } else {
          alert('Credenciales incorrectas');
        }
      })
      .catch((error) => {
        console.error('Error:', error);
        alert('Error al intentar iniciar sesión');
      });
  };

  return (
    <div className='ps-5 pt-5'>
      <form onSubmit={handleLogin}>
        <h2>Inicia sesión</h2>
        <div>
          <label>
            Email:
            <input type="text" value={email} onChange={(e) => setEmail(e.target.value)} />
          </label>
        </div>
        <div>
          <label>
            Contraseña:
            <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} />
          </label>
        </div>
        <button type="submit">Iniciar sesión</button>
      </form>
    </div>
  );
}

export default InicioSesion;
