<?php

namespace App\Controller;

use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student/new")
     */
    public function new(EntityManagerInterface $em): Response
    {
        $stu = new Student();
        $stu->setNaam('Depp')
            ->setVoornaam('Magdalena')
            ->setPunten(78);

        dump($stu);

        $em->persist($stu);       //send $stu to Doctrine
        $em->flush();               //execute (insert or other needed) queries


        return new Response('Nieuwe student: ' .$stu->getNaam() );
    }


    /**
     * @Route("/student/{id}", name="app_student_show")
     */
    public function show($id, EntityManagerInterface $em): Response
    {
        $repo = $em->getRepository(Student::class);

        $student = $repo->findOneBy([ 'id' => $id ]);

        // als er geen student hebben, toon error
        if ( !$student ){
            throw $this->createNotFoundException("Student not found");
        }
        dump($student);

//        return new Response("De gevraagde student met id $id vind je bij de dumps");
        return $this->render('student/detail.html.twig', [
            'student' => $student,
        ]);

    }

    /**
     * @Route("/students", name="app_students_show")
     */
    public function showAll( EntityManagerInterface $em): Response
    {
        $repo = $em->getRepository(Student::class);
        $students = $repo->findAll();

        // als er geen studenten hebben, toon error
        if ( !$students ){
            throw $this->createNotFoundException("Students not found");
        }
        dd($students);

        return new Response("Alle students vind je bij de dumps");

    }
}