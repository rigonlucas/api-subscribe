<?php

namespace App\Core\Support\Enums;

enum FieldTypeEnum
{
    case TEXT;
    case TEXTAREA;
    case RADIO;
    case CHECKBOX;
    case SELECT_SINGLE;
    case SELECT_MULTIPLE;

    public static function all (): array
    {
        return array_column(self::cases(), 'name');
    }
}
