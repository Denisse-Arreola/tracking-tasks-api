<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ScopeFilter
{
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        foreach($filters as $key => $value) {
            if (array_key_exists($key, $this->filters)) {
                $filter_class = new $this->filters[$key]();
                $query = $filter_class->handle($query, $value, $this->getTable());
            }
        }

        return $query;
    }
}
