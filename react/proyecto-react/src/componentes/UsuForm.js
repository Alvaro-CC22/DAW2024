import React, { useState } from 'react';
import { useEffect } from 'react';
import '../hojas_de_estilos/UsuForm.css';

const UsuForm = () => {

    useEffect(() => {
        document.body.style.paddingTop = '60px';
        return () => {
          document.body.style.paddingTop = '0';
        };
      }, []);
      
    const [usuario, setUsuario] = useState({
        nombre: '',
        email: '',
        password: ''
    });
    const [error, setError] = useState('');

    const handleChange = (event) => {
        const { name, value } = event.target;
        setUsuario(prevUsuario => ({
            ...prevUsuario,
            [name]: value
        }));
    };

    const handleSubmit = (event) => {
        event.preventDefault();
        fetch('http://localhost:3001/usuarios', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(usuario)
        })
        .then(response => {
            if (response.ok) {
                alert('Usuario creado exitosamente');
                
            } else {
                return response.json();
            }
        })
        .then(data => {
            if (data && data.error) {
                setError(data.error);
            }
        })
        .catch(error => console.error('Error en la solicitud:', error));
    };

    return (
        <div className="container">
            <h2>Formulario de Alta de Usuario</h2>
            {error && <div className="error">{error}</div>}
            <form onSubmit={handleSubmit}>
                <label htmlFor="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value={usuario.nombre} onChange={handleChange} required/>
                <label htmlFor="email">Email:</label>
                <input type="email" id="email" name="email" value={usuario.email} onChange={handleChange} required/>
                <label htmlFor="password">Contraseña:</label>
                <input type="password" id="password" name="password" value={usuario.password} onChange={handleChange} required/>
                <input type="submit" value="Registrarse"/>
            </form>
        </div>
    );
};

export default UsuForm;
