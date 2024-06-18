<?php

namespace App\Controller;

use App\Entity\Playlist;
use App\Form\EditPlaylisType;
use App\Form\PlaylistType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PlaylistController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/playlist/add', name: 'playlist_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->security->getUser();
        $playlist = new Playlist();
        $playlist->setUser($user); // Asociar el usuario logueado a la playlist
        $form = $this->createForm(PlaylistType::class, $playlist);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($playlist);
            $entityManager->flush();

            return $this->redirectToRoute('app_perfil');
        }

        return $this->render('playlist/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/playlist/edit', name: 'playlist_edit')]
    public function edit(Request $request, Playlist $playlist, EntityManagerInterface $entityManager): Response
    {   
        $request = Request::createFromGlobals();

        $form = $this->createForm(EditPlaylisType::class, $playlist);

        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {
            $playlist = $form -> getData();
            $resultados = $entityManager->getRepository(Playlist::class)->find($request->query->get('id'));
            
            if (!empty($playlist->getNombre())) {
                $resultados ->setNombre($playlist->getNombre());
            }

            foreach ($resultados->getCanciones() as $cancion) {
                $resultados ->removeCancione($cancion);
            }

            foreach ($playlist->getCanciones() as $cancion) {
                $resultados ->addCancione($cancion);
            }

                
            
            $entityManager->flush();

            return $this->redirectToRoute('app_perfil');
        }

        return $this->render('playlist/edit.html.twig', [
            'form' => $form->createView(),
            'playlist' => $playlist,
        ]);
    }

    #[Route('/playlist/{id}/delete', name: 'playlist_delete')]
    public function delete(Request $request, Playlist $playlist, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $playlist->getId(), $request->request->get('_token'))) {
            
            $entityManager->remove($playlist);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_perfil');
    }

    #[Route('/playlist/{id}', name: 'playlist_show')]
    public function show($id, EntityManagerInterface $em): Response
    {
        $playlist = $em->getRepository(Playlist::class)->find($id);

        if (!$playlist) {
            throw $this->createNotFoundException('La canción no existe');
        }

        return $this->render('playlist/show.html.twig', ['playlist' => $playlist]);
    }
}
