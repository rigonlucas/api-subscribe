<?php

namespace App\Core\Support\Pagination\Inputs;

class PreparePagination
{
    protected function preparePagination (array $array): array
    {
        return [
            [
                'data' => $array['data']
            ],
            [
                'meta' => [
                    'current_page' => $array['current_page'],
                    'from' => $array['from'],
                    'last_page' => $array['last_page'],
                    'per_page' => $array['per_page'],
                    'to' => $array['to'],
                    'total' => $array['total'],
                ]
            ],
            [
                'links' => $array['links']
            ]
        ];
    }
}
