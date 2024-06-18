import React, { useEffect } from 'react';
import '../hojas_de_estilos/Info.css';
import FI from '../imagenes/FondoInfo.jpg';

const Info = () => {

  useEffect(() => {
    document.body.style.paddingTop = '50px';
    return () => {
      document.body.style.paddingTop = '0';
    };
  }, []);

  return (
    <div className="inicio-container">
      <h1>Un poco de nosotros</h1>
      <div className='row'>
      <div className='col-12 col-lg-4 order-2 order-lg-1'>
      
      <p className='col'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta deserunt quaerat harum, rerum repellendus beatae debitis ab totam, maxime reiciendis aperiam suscipit quod esse labore error ipsa dolore necessitatibus assumenda!</p>
      <p className='col'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium odio officia sequi natus at soluta ullam velit excepturi exercitationem! Corrupti officia sunt quidem libero magni et, facilis blanditiis reiciendis ab.
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error officiis magnam reiciendis quasi ipsam hic a tempora nihil in modi atque eos, ullam laudantium cum id, magni asperiores voluptas corrupti!

        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus explicabo alias quod. Ipsam voluptates voluptatem aperiam quasi, molestiae voluptas autem velit vel laboriosam at enim, deleniti animi minus! Autem, reiciendis.</p>
      <p className='col'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium odio officia sequi natus at soluta ullam velit excepturi exercitationem! Corrupti officia sunt quidem libero magni et, facilis blanditiis reiciendis ab.
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error officiis magnam reiciendis quasi ipsam hic a tempora nihil in modi atque eos, ullam laudantium cum id, magni asperiores voluptas corrupti!

        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus explicabo alias quod. Ipsam voluptates voluptatem aperiam quasi, molestiae voluptas autem velit vel laboriosam at enim, deleniti animi minus! Autem, reiciendis.</p>
        </div>
        <div className='col-12 ps-5 order-1 order-lg-2 col-lg-8'>
          <img className=' w-50' src={FI} alt='Estatua de Marcus Tullius Cicero'></img>
        </div>
        </div>
    </div>
  );
};

export default Info;