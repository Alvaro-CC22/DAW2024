<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/redirect', name: 'app_redirect')]
    public function redirectToHome(): Response
    {
        return $this->redirectToRoute('app_home');
    }

    #[Route('/external', name: 'app_external')]
    public function redirectToExternal()
    {
        $redireccion = new RedirectResponse('/');

        $redireccion->setTargetUrl('http://www.google.com');

        return $redireccion;
    }
}
