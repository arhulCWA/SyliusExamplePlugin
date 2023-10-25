<?php

namespace Cwa\SyliusExamplePlugin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class testController extends AbstractController
{
    public function index(): Response
    {
        return $this->render("test/test.html.twig");
    }
}
