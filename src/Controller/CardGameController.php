<?php

namespace App\Controller;

use App\Service\CardGameService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * API controller for card game operations
 */
class CardGameController extends AbstractController
{
    public function __construct(
        private readonly CardGameService $cardGameService
    ) {
    }

    /**
     * Generate and return a random hand of cards
     *
     * @Route("/api/cards/generate", name="generate_cards", methods={"GET"})
     */
    #[Route('/api/cards/generate', name: 'generate_cards', methods: ['GET'])]
    public function generateCards(): JsonResponse
    {
        $hand = $this->cardGameService->generateRandomHand();

        return $this->json([
            'unsorted' => array_map(fn($card) => $card->toArray(), $hand),
            'sorted' => array_map(fn($card) => $card->toArray(), $this->cardGameService->sortHand($hand))
        ]);
    }
}