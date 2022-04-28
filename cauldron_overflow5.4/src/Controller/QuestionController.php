<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('HomePage! What a bewitching controller we have conjured!');
    }

    /**
     *  @Route("/questions/{slug}")
     */ public  function  show( $slug)
{
    $answers  =  [
        'Make  sure  your  cat  is  sitting  purrrfectly  still',
        'Honestly,  I  like  furry  shoes  better  than  MY  cat',
        'Maybe…  try  saying  the  spell  backwards?',
    ] ;
    return  $this->render(
        'question/show.html.twig',
        [
            'question'  =>  ucwords( str_replace( '-' ,  '  ',   $slug)) ,
            'answers'  =>  $answers
        ]
    ) ; }
}

// reneder always returns Response object with HTML inside.
// reneder geeft response op basis van html template

//1 arg- templ; 2- array met data