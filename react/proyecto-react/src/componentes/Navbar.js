import React, { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';

const Navbar = () => {
  const navigate = useNavigate();
  const usuarioLogueado = sessionStorage.getItem('usuarioLogueado');
  const [isNavOpen, setIsNavOpen] = useState(false);

  const handleLogout = () => {
    sessionStorage.removeItem('usuarioLogueado'); 
    navigate('/');
  };

  const toggleNav = () => {
    setIsNavOpen(!isNavOpen);
  };

  return (
    <nav className="navbar navbar-expand-lg navbar-info bg-info fixed-top ">
      <div className="container-fluid">
        <button className="navbar-toggler bg-white" type="button" onClick={toggleNav}>
          <span className="navbar-toggler-icon "></span>
        </button>
        <div className={`collapse navbar-collapse ${isNavOpen ? 'show' : ''}`} id="navbarSupportedContent">
          <ul className="navbar-nav mr-auto">
            <li className="nav-item">
              <Link to="/" className="nav-link">Inicio</Link>
            </li>
            <li className="nav-item">
              <Link to="/acerca-de" className="nav-link">Acerca de</Link>
            </li>
            {!usuarioLogueado  ? (
              <>
                <li className="nav-item">
                  <Link to="/registro" className="nav-link">Alta de Usuario</Link>
                </li>
                <li className="nav-item">
                  <Link to="/login" className="nav-link">Login</Link>
                </li>
              </>
            ) : (
              <>
                <li className="nav-item">
                  <Link to="/calculadora" className="nav-link">Calculadora</Link>
                </li>
                <li className="nav-item">
                  <button className="nav-link btn btn-link" onClick={handleLogout}>Cerrar Sesión</button>
                </li>
              </>
            )}
          </ul>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;
