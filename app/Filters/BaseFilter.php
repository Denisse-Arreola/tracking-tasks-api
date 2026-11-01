<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseFilter 
{
    abstract public function handle(
        Builder $query,
        mixed $value,
        string $table
    ): Builder;
}