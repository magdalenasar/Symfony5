<?php

namespace App\Controller;

use App\Services\DBManager;
use App\Services\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $dbManager;
    private $logger;

    public function __construct(DBManager $dbManager, Logger $logger)
    {
        $this->dbManager = $dbManager;
        $this->logger = $logger;
    }


    /**
     * @Route("/")
     * @return Response
     */
    public function home(): Response
    {
        $this->logger->Log("Dit is een bericht vanuit de HomeController");

        return $this->render("home/home.html.twig");
    }

    /**
     * @Route("/api/films")
     * @return Response
     */
    public function apiFilms(){

        $data = $this -> dbManager->GetData("select * from film");
//        dump($data);

//        return new Response("Dit is second home");
        return $this->json($data);
    }

    /**
     * @Route("/api/film/{id}")
     * @return Response
     */
    public function apiGetOneFilm($id){

        $data = $this -> dbManager->GetData("SELECT * from film WHERE film_id=$id");

        return $this->json($data);
    }
}