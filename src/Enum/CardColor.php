<?php
namespace App\Enum;

enum CardColor: string
{
    case DIAMONDS = 'Carreaux';
    case HEARTS = 'Cœur';
    case SPADES = 'Pique';
    case CLUBS = 'Trèfle';

    /**
     * Get the order of the color for sorting
     */
    public function getOrder(): int
    {
        return match($this) {
            self::DIAMONDS => 1,
            self::HEARTS => 2,
            self::SPADES => 3,
            self::CLUBS => 4,
        };
    }
}