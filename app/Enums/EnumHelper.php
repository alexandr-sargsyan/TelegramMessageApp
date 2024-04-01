<?php

namespace App\Enums;

trait EnumHelper
{
    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    public static function keys(): array
    {
        return array_map(fn($case) => $case->name, self::cases());
    }
}
