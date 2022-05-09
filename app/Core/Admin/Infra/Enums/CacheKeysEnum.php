<?php

namespace App\Core\Admin\Infra\Enums;

enum CacheKeysEnum: string
{
    case PREFIX_PAYMENT_TYPE = 'payment_types';
    case PREFIX_PAYMENT_VALUE = 'payment_values';
}
