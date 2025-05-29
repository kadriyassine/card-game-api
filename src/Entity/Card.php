<?php

namespace App\Entity;

use App\Enum\CardColor;
use App\Enum\CardValue;

/**
 * Represents a playing card with color and value
 */
class Card
{
    public function __construct(
        private readonly CardColor $color,
        private readonly CardValue $value
    ) {
    }

    public function getColor(): CardColor
    {
        return $this->color;
    }

    public function getValue(): CardValue
    {
        return $this->value;
    }

    /**
     * Convert card to array for JSON serialization
     */
    public function toArray(): array
    {
        return [
            'color' => $this->color->value,
            'value' => $this->value->value
        ];
    }
}