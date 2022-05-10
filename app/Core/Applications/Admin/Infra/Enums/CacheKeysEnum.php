<?php

namespace App\Core\Applications\Admin\Infra\Enums;

enum CacheKeysEnum: string
{
    case PREFIX_PAYMENT_TYPE = 'payment_types';
    case PREFIX_PAYMENT_VALUE = 'payment_values';

    case PREFIX_PROCESS_TYPE = 'process_types';
    case PREFIX_FIELD_GROUP = 'field_groups';
}
