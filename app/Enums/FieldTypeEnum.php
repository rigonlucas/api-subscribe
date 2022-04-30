<?php

namespace App\Enums;

enum FieldTypeEnum
{
    case TEXT;
    case TEXTAREA;
    case RADIO;
    case CHECKBOX;
    case SELECT_SINGLE;
    case SELECT_MULTIPLE;
}
