<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/{name<[a-z]+>?word}", host="localhost", name="hello")
     */

    public function hello($name)
    {
        return $this->render('hello.html.twig', ["prenom" => $name]);
    }

    /**
     * @Route("/exemple", name="example")
     */
    public function exemple()
    {
        return $this->render('exemple.html.twig', ["age" => 33]);
    }
}
