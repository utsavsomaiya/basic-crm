<?php

namespace App\Enums\Enums;

enum CustomFieldType: int
{
    case TEXT = 1;
    case DATE = 2;
    case NUMBER = 3;
    case OPTIONS = 4;
    case CURRENCY = 5;
    case YEAR = 6;
    case PHONE = 7;
    case TEXTAREA = 8;
}
