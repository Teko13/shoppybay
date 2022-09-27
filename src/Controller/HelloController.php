<?php

namespace App\Controller;

use App\Taxes\Calculator;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    protected $tva;

    public function __construct(Calculator $calcul_tva)
    {
        $this->tva = $calcul_tva;
    }
    /**
     * @Route("/hello/{name<[a-z]+>?word}", host="localhost", name="hello")
     */

    public function hello(Request $request, $name)
    {
        $prix = $this->tva->calcul(100);
        dump($prix);
        return new Response("Hello $name");
    }
}
