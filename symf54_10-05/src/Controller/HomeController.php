<?php

namespace App\Controller;

use App\Services\DBManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     * @param DBManager $dbManager
     * @return Response
     */
    public function home(DBManager $dbManager): Response
    {
        $data = $dbManager->GetData("select * from films");
        dump($data);

        return $this->render("home/home.html.twig");
    }
}