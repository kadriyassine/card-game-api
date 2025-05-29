<?php

namespace App\Service;

use App\Entity\Card;
use App\Enum\CardColor;
use App\Enum\CardValue;

/**
 * Service to handle card game logic
 */
class CardGameService
{
    /**
     * Generate a random hand of cards
     *
     * @param int $numberOfCards Number of cards to generate (default 10)
     * @return array<Card> Array of Card objects
     */
    public function generateRandomHand(int $numberOfCards = 10): array
    {
        $hand = [];
        $availableCards = $this->generateAllPossibleCards();

        shuffle($availableCards);

        for ($i = 0; $i < $numberOfCards && $i < count($availableCards); $i++) {
            $hand[] = $availableCards[$i];
        }

        return $hand;
    }

    /**
     * Sort a hand of cards according to game rules
     *
     * @param array<Card> $hand The hand to sort
     * @return array<Card> Sorted hand
     */
    public function sortHand(array $hand): array
    {
        usort($hand, function (Card $a, Card $b) {
            // First sort by color order
            $colorComparison = $a->getColor()->getOrder() <=> $b->getColor()->getOrder();

            if ($colorComparison !== 0) {
                return $colorComparison;
            }

            // If same color, sort by value order
            return $a->getValue()->getOrder() <=> $b->getValue()->getOrder();
        });

        return $hand;
    }

    /**
     * Generate all possible 52 cards in a deck
     *
     * @return array<Card> All possible cards
     */
    private function generateAllPossibleCards(): array
    {
        $cards = [];

        foreach (CardColor::cases() as $color) {
            foreach (CardValue::cases() as $value) {
                $cards[] = new Card($color, $value);
            }
        }

        return $cards;
    }
}