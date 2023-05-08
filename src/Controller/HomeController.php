<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home', methods: ['GET'])]
    public function index(): Response
    {
        $prenoms = ['Jean', 'Tom', 'Bob'];

        return $this->render('home.html.twig', [
            'prenoms' => $prenoms
        ]);
    }

    //Route variable grâce à la connection entre {name} et $name
    // Par défaut le chemin avant {e} n'est pas accessible dans l'URL. Donc je ne peux pas me rendre à /hello
    // Pour résoudre ce problème je dois rendre {e} facultatif en
    // ajoutant = null dans les paramètres de la function hello($name)
    #[Route('/hello/{name}',  name: 'hello' )]
    public function hello($name = null): Response
    {
        return $this->render('hello.html.twig', [
            'name' => $name
        ]);
    }
}
