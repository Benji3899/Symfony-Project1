<?php

namespace App\Controller;

use PHPUnit\Util\Json;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/song/{id<\d+>}', name: 'app_song', methods: 'GET')]
    /*<\d+> attend un nombre. si on met une chaine, l'erreur sera 404 notfound
    alors qu'avant 500 (à éviter)*/
    public function getSong(int $id, LoggerInterface $logger): Response // ajout de int pour que {id} soit un entier
    {
        // query the database
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];

//        $logger->info('Retour de réponse API pour le song'.$id);
// notation équivalente
        $logger->info('Retour de réponse API pour le song {song}',[
            'song' => $id,
            ]);




        return new JsonResponse($song);
        // equivalent grâce a Abstract Controller => return $this->json($song);
    }
}
