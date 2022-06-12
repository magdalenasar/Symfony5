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
    public function new(EntityManagerInterface $em)
    {
        $stu = new Student();
        $stu->setNaam('Sarandeva')
            ->setVoornaam('Magdalena')
            ->setPunten(78);

        dump($stu);

        $em->persist($stu);       //send $stu to Doctrine
        $em->flush();               //execute (insert or other needed) queries


        return new Response('Nieuwe student: ' .$stu->getNaam() );
    }

}