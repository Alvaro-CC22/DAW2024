<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MainController.php',
        ]);
    }

    #[Route('/home/{var}', name: 'app_home')]
    public function homepage(string $var): Response
    {
        return new Response('<strong>' .$var .' Españita</strong>');
    }

    #[Route('/addstudent', name: 'app_addstudent')]
    public function addStudent(EntityManagerInterface $entityManager): Response
    {
        $student = new Student();
        $student -> setName('Álvaro');
        $student -> setSurname('Camacho');
        $student -> setDni('38594928A');
        $student -> setEmail('alvaro@gmail.com');

        $entityManager -> persist($student);
        $entityManager -> flush();

        return new Response('Student saved succesfully with id: ' .$student->getDni());
    }

    #[Route('/getstudent/{id}', name: 'app_getstudent')]
    public function getStudent(EntityManagerInterface $entityManager, int $id): Response
    {
        $student = $entityManager -> getRepository(Student :: class) -> find($id);

        if(!$student){
            throw $this -> createNotFoundException('No student with that ID: '.$id);
        }

        return new Response('Student\'s name ' .$student -> getName());        
    }

    #[Route('/formstudent', name: 'app_formstudent', methods: ['GET', 'POST'])]
    public function formStudent(Request $request, EntityManagerInterface $entityManager): Response
    {
        $student = new Student();
        $form = $this -> createForm(StudentType::class, $student);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid()){
            $entityManager -> persist($student);
            $entityManager -> flush();

            return $this -> redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this -> render('formstudent.html.twig', ['student' => $student, 'form' => $form]);
    }
}