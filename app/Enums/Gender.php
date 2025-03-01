<?php

namespace App\Enums;

use App\Enums\Traits\Values;
use Illuminate\Support\Str;

enum Gender: int
{
    use Values;

    case MALE = 1;
    case FEMALE = 2;
    case OTHER = 3;

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
