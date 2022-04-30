<?php

namespace App\Traits;

trait EnumOptions
{
    public static function arrayOptions(): array
    {
        $enumCases = static::cases();
        return isset($enumCases[0])
            ? array_column($enumCases, 'value', 'name')
            : array_column($enumCases, 'name');
    }
}
