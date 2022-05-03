<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $message = 'Hello World';
        $fruits = array('banane', 'kiwi', 'papaye');

        return $this->render('default/index.html.twig', [
            'title' => 'Homepage',
            'mes' => $message,
            'fruits' => $fruits,
        ]);
    }

    #[Route('/json', name: 'page_test_json')]
    public function testjson(): Response
    {
        $fruits = array('banane', 'kiwi', 'papaye');
        return $this->json($fruits);
    }

    #[Route('/contact', name: 'page_contact')]
    public function contact(): Response
    {
        return $this->render('default/contact.html.twig', [
            'title' => 'Contact'
        ]);
    }
}
