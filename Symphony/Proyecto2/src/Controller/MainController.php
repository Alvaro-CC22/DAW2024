<?php

namespace App\Controller;

use App\Entity\Producto;
use App\Entity\Carrito;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/addproducto', name: 'app_addproducto')]
    public function addProducto(EntityManagerInterface $entityManager): Response
    {
        $producto = new Producto();
        $producto -> setNombre('Radio');
        $producto -> setDescripcion('Radio para cassetes y cd');
        $producto -> setPrecio('19.99');
        $producto -> setStock('25');

        $entityManager -> persist($producto);
        $entityManager -> flush();

        return new Response('Producto guardado con éxito con la siguiente id: ' .$producto -> getId());
    }

    #[Route('/showproducto', name: 'app_showproducto')]
    public function showProduto(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Producto::class);
        $products = $repository->findAll();

        

        return $this->render('main/index.html.twig', ['products' => $products]);
    }

    #[Route('/showproducto/{id}', name: 'app_showbyid')]
    public function showProdutoEspecifico(EntityManagerInterface $entityManager, int $id): Response
    {
        $repository = $entityManager->getRepository(Producto::class);
        $product = $repository->find($id);

        

        return $this->render('main/showbyid.html.twig', ['product' => $product]);
    }

    #[Route('/carrito', name: 'app_carrito')]
    public function showCarrito(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Carrito::class);
        $products = $repository->findAll();

        

        return $this->render('main/showcarrito.html.twig', ['products' => $products]);
    }
    #[Route('/añadircarrito/{id}', name: 'app_showbyid')]
    public function añadirACarrito(EntityManagerInterface $entityManager, int $id): Response
    {
        $repository = $entityManager->getRepository(Producto::class);
        $product = $repository->find($id);

        $prodCarro = new Carrito();
        $prodCarro -> setNombre($product -> getNombre());
        $prodCarro -> setPrecio($product -> getPrecio());

        $entityManager -> persist($prodCarro);
        $entityManager -> flush();

        return new Response('Producto guardado en el carrito: ' .$prodCarro -> getNombre());
    }
}