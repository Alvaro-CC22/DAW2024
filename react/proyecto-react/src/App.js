import './App.css';
import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import Navbar from './componentes/Navbar.js';
import Inicio from './componentes/Inicio.js';
import Info from './componentes/Info.js';
import Calculadora from './paginas/Calculadora.js';
import Registro from './componentes/UsuForm';
import Login from './componentes/Login';

function App() {
  return (
    <Router>
      <div className="app-container">
      <Navbar />
        <Routes>
          <Route path="/" element={<Inicio/>} />
          <Route path="/acerca-de" element={<Info/>} />
          <Route path="/calculadora" element={<Calculadora/>} />
          <Route path="/registro" element={<Registro/>} />
          <Route path="/login" element={<Login/>} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;