<?php

namespace App\Enums;

use App\Enums\Traits\Values;

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
}
