<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum Gender: int
{
    case MALE = 1;
    case FEMALE = 2;
    case OTHER = 3;

    /**
     * @return int[]
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * @return array<int, string>
     */
    public static function getOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [$case->value => Str::of($case->name)->lower()->ucfirst()->toString()])
            ->all();
    }
}
