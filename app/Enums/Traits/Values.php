<?php

namespace App\Enums\Traits;

trait Values
{
    /**
     * @return int[]
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
