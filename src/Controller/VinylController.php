<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_vinyl')]
    public function index(Environment $twig): Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artiste' => 'Coolio'],
            ['song' => 'Waterfalls', 'artiste' => 'TLC'],
            ['song' => 'Creep', 'artiste' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artiste' => 'Seal'],
            ['song' => 'On Bended Knee', 'artiste' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artiste' => 'Mariah Carey'],
        ];

//        dd($tracks); // dd() est une function équivalente a dump()
// et s'affiche directement sur la page
//        dump($tracks); // s'affiche dans la debug bar (icone cible)

//        return $this->render('vinyl/index.html.twig', [
//            'title' => 'Vinyl Page',
//            'tracks' => $tracks,
//        ]);

        $html = $twig->render('vinyl/index.html.twig', [
            'title' => 'Vinyl Page',
            'tracks' => $tracks,
        ]);
        return new Response($html);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
//        if($slug) {
//            $title = 'Genre: ' . u(str_replace('-', ' ', $slug))->title(true);
//        }else{
//            $title = 'All genre';
//        }
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre
        ]);
    }
}
