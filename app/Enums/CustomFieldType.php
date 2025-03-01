<?php

namespace App\Enums;

use Illuminate\Support\Str;
use App\Enums\Traits\Values;
use Stringable;

enum CustomFieldType: int
{
    use Values;

    case TEXT = 1;
    case DATE = 2;
    case NUMBER = 3;
    case OPTIONS = 4;
    case CURRENCY = 5;
    case YEAR = 6;
    case PHONE = 7;
    case TEXTAREA = 8;

    public function getName(): Stringable
    {
        return Str::of($this->name)->lower()->ucfirst();
    }
}
