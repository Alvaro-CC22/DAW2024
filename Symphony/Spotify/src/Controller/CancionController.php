<?php

namespace App\Controller;

use App\Entity\Cancion;
use App\Form\BuscarFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class CancionController extends AbstractController
{
    #[Route('/cancion/{id}/play', name: 'cancion_play')]
    public function play($id, EntityManagerInterface $em): Response
    {
        $cancion = $em->getRepository(Cancion::class)->find($id);

        if (!$cancion) {
            throw $this->createNotFoundException('La canción no existe');
        }

        $rutaArchivo = $this->getParameter('directorio_canciones').'\\'.$cancion->getArchivo();
        $response = new BinaryFileResponse($rutaArchivo);
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            $cancion->getNombre().'.'.pathinfo($rutaArchivo, PATHINFO_EXTENSION)
        );

        return $response;
    }

    #[Route('/canciones', name: 'cancion_list')]
    public function showlist(EntityManagerInterface $em): Response
    {
        $canciones = $em->getRepository(Cancion::class)->findAll();

        return $this->render('cancion/list.html.twig', [
            'canciones' => $canciones,
        ]);
    }

    #[Route('/cancion/{id}', name: 'cancion_show')]
    public function show($id, EntityManagerInterface $em): Response
    {
        $cancion = $em->getRepository(Cancion::class)->find($id);

        if (!$cancion) {
            throw $this->createNotFoundException('La canción no existe');
        }

        return $this->render('cancion/play.html.twig', [
            'cancion' => $cancion,
        ]);
    }

    

    #[Route('/buscar', name: 'buscar')]
    public function buscar(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cancion = new Cancion;
        $form = $this->createForm(BuscarFormType::class, $cancion);
        $form->handleRequest($request);
        $canciones = [];
        

        if ($form->isSubmitted() && $form->isValid()) {
            $cancion = $form->getData();
            

            if (!empty($cancion->getNombre())) {
                $resultados = $entityManager->getRepository(Cancion::class)->findByPartialName($cancion->getNombre());
                $canciones = array_merge($canciones, $resultados);

                
            }

            if (!empty($cancion->getArtista())) {
                $resultados = $entityManager->getRepository(Cancion::class)->findByPartialArtist($cancion->getArtista());
                $canciones = array_merge($canciones, $resultados);

            }

            if (!empty($cancion->getAno())) {
                $resultados = $entityManager->getRepository(Cancion::class)->findBy(['ano' => $cancion->getAno()]);
                $canciones = array_merge($canciones, $resultados);

            }

            if (!empty($cancion->getAlbum())) {
                $resultados = $entityManager->getRepository(Cancion::class)->findByPartialAlbum($cancion->getAlbum());
                $canciones = array_merge($canciones, $resultados);

            }
        }

        return $this->render('cancion/buscar.html.twig', [
            'form' => $form->createView(),
            'canciones' => $canciones,
        ]);
    }
}