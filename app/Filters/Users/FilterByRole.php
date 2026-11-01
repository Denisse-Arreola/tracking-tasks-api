<?php

namespace App\Filters\Users;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\BaseFilter;

class FilterByRole extends BaseFilter
{
    public function handle(Builder $query, mixed $value, string $table): Builder
    {
        if (!is_string($value) || trim($value) === '') {
            return $query;
        }
        return $query->where('role', trim($value));
    }
}