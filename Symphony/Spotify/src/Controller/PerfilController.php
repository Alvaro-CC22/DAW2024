<?php

namespace App\Controller;

use App\Entity\Playlist;
use App\Repository\PlaylistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PerfilController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/perfil', name: 'app_perfil')]
    public function index(PlaylistRepository $playlistRepository): Response
    {
        $user = $this->security->getUser();
        $playlists = $playlistRepository->findBy(['User' => $user]);

        return $this->render('perfil/index.html.twig', [
            'user' => $user,
            'playlists' => $playlists,
        ]);
    }
}
