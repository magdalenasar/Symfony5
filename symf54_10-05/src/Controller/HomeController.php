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
     * @Route("/home", name="app_home")
     * @return Response
     */
    public function app_home(): Response
    {
        $this->logger->Log("Dit is een bericht vanuit de HomeController");

        return $this->render("home/home.html.twig");
    }

    /**
     * @Route("/api/films" , methods={"GET"}, name="api_films_getAll")
     * @return Response
     */
    public function apiFilms(){

        $data = $this -> dbManager->GetData("select * from film");
        dump($data);

        return $this->json($data);
    }

    /**
     * @Route("/api/film/{id}", methods={"GET"}, name="api_film_getOne")
     * @return Response
     */
    public function apiGetOneFilm($id){

        $data = $this -> dbManager->GetData("SELECT * FROM film WHERE film_id=$id");

        return $this->json($data);
    }

    /**
     * @Route("/api/films", methods={"POST"}, name="api_film_post")
     * @return Response
     */
    public function apiFilmsPost()
    {
        // check the body of the req
        $contents =  json_decode( file_get_contents("php://input") );

        // als leeg is
        if ($contents) // als de body in JSON formaat is...
        {
            $title = $contents -> title;
        } else {
            $title = $_POST['title']; // als we een klassiek HTML form verzenden...

        }

        $messages[] = "Posting a new film! " . $title;

        return $this->json($messages);

    }
    /**
     * @Route("/form", methods={"GET"}, name="form_register")
     */
    public function formRegister()
    {
        return $this->render("forms/register.html.twig");
    }
}