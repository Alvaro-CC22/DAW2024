<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SaluteController extends AbstractController
{
    #[Route('/salute/{nombre}', name: 'app_salute')]
    public function saludo($nombre = null): Response
    {
        if($nombre === null){
            return $this->render('salute/salute.html.twig', [
                'nombre' => 'usuario'
            ]);
        }
        else{
            if($nombre && preg_match('/^[a-zA-Z]+$/', $nombre)){
                return $this->render('salute/salute.html.twig', [
                    'nombre' => $nombre
                ]);
            }
            else{
                return $this->render('salute/salute.html.twig', [
                    'nombre' => 'usuario'
                ]);
            }
        }
    }
}