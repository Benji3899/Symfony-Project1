<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'vinyl')]
    public function index(): Response
    {
//        $tracks = [
//            'Gangsta\'s Paradise - Coolio',
//            'Waterfalls - TLC',
//            'Creep - Radiohead',
//            'Kiss from a Rose - Seal',
//            'On Bended Knee - Boyz II Men',
//            'Fantasy - Mariah Carey',
//        ];

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

        return $this->render('vinyl/index.html.twig', [
            'title' => 'Vinyl Page',
            'tracks' => $tracks,
        ]);

    }
    #[Route('/browse/{slug}', name: 'browse')]
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
