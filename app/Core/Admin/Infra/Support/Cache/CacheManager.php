<?php

namespace App\Core\Admin\Infra\Support\Cache;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Cache;

trait CacheManager
{
    protected function createCache (string $key, mixed $value): mixed
    {
        return Cache::rememberForever($key, function () use ($value) {
            if ($value instanceof QueryBuilder || $value instanceof EloquentBuilder) {
                return $value->get();
            }
            return $value;
        });
    }

    protected function deleteCache (string $key): void
    {
        Cache::forget($key);
    }
}
