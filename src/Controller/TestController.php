<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController
{
    public function index()
    {
        var_dump("ca fonctionne");
        die();
    }
    public function test(Request $request, $age)
    {
        return new Response("Vous avez $age ans");
    }
}
