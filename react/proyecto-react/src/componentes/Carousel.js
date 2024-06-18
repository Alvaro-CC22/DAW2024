import React from "react";
import '../hojas_de_estilos/Carousel.css';

const Info = () => {
    return (
        document.addEventListener('DOMContentLoaded', function () {
            const images = ['imagen1.jpg', 'imagen2.jpg', 'imagen3.jpg']; 
            const intervalTime = 3000; 
        
            const carouselInner = document.getElementById('carousel-inner');
            let currentIndex = 0;
        
            function showSlide(index) {
                carouselInner.innerHTML = ''; 
        
                const slide = document.createElement('div');
                slide.classList.add('carousel-item');
                slide.innerHTML = `<img src="${images[index]}" alt="Slide ${index + 1}">`;
                carouselInner.appendChild(slide);
            }
        
            function nextSlide() {
                currentIndex = (currentIndex + 1) % images.length;
                showSlide(currentIndex);
            }
        
            function prevSlide() {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                showSlide(currentIndex);
            }
        
            showSlide(currentIndex);
        
            setInterval(nextSlide, intervalTime);
        }
        )
    )
        
    };
  
  export default Info;