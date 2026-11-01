<?php

namespace App\Filters\Users;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\BaseFilter;

class FilterBySearchTerm extends BaseFilter
{
    public function handle(Builder $query, mixed $value, string $table): Builder
    {
        if (!is_string($value) || trim($value) === '') {
            return $query;
        }

        $searchTerm = trim($value);
        $fields = ['fullname', 'nickname', 'email'];

        return $query->where(function (Builder $query) use ($fields, $searchTerm) {
            foreach($fields as $field) {
                $query->orWhere($field, 'like', '%' . $searchTerm . '%');
            }
        });
    }
}