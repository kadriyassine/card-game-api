<?php

namespace App\Enum;

enum CardValue: string
{
    case ACE = 'AS';
    case TWO = '2';
    case THREE = '3';
    case FOUR = '4';
    case FIVE = '5';
    case SIX = '6';
    case SEVEN = '7';
    case EIGHT = '8';
    case NINE = '9';
    case TEN = '10';
    case JACK = 'Valet';
    case QUEEN = 'Dame';
    case KING = 'Roi';

    /**
     * Get the order of the value for sorting
     */
    public function getOrder(): int
    {
        return match($this) {
            self::ACE => 1,
            self::TWO => 2,
            self::THREE => 3,
            self::FOUR => 4,
            self::FIVE => 5,
            self::SIX => 6,
            self::SEVEN => 7,
            self::EIGHT => 8,
            self::NINE => 9,
            self::TEN => 10,
            self::JACK => 11,
            self::QUEEN => 12,
            self::KING => 13,
        };
    }
}