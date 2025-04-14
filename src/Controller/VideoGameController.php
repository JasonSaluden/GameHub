<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\GameRepository;
use App\Entity\Game;
use App\Form\GameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class VideoGameController extends AbstractController
{
    #[Route('/video/game', name: 'app_video_game')]
    public function index(GameRepository $gameRepository): Response
    {
        $games = $gameRepository->findAllGames();

        return $this->render('video_game/index.html.twig', [
            'games' => $games,
        ]);
    }

    #[Route('/video/game/add', name: 'app_video_game_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response 
    {

        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        
        $game = new Game();
        $form = $this->createForm(GameType::class, $game);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('imageFile')->getData();
            
            if($image) {
                $newFilename = uniqid() . '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('images_directory'), 
                    $newFilename
                );
                
                $game->setImageFileName($newFilename);
            }
            
            $entityManager->persist($game);
            $entityManager->flush();

            $this->addFlash('success', 'Le jeu a bien été créé !');
            return $this->redirectToRoute('app_video_game');
        }
        return $this->render('video_game/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
