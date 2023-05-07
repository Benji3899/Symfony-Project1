<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController extends AbstractController
{
    #[Route('/vinyl', name: 'vinyl')]
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

        return $this->render('vinyl/index.html.twig', [
            'title' => 'Vinyl Page',
            'tracks' => $tracks,
        ]);
    }
}
