<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Doctrine\Dbal\ConnectionConfig\ReplicaConfig;
use function Symfony\Component\String\u;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
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

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if($slug) {
            $title = 'Genre: ' . u(str_replace('-', ' ', $slug))->title(true);
        }else{
            $title = 'All genre';
        }
        return new Response($title);
    }
}
