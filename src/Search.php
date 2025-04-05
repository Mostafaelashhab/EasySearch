<?php

namespace YourVendor\SearchPackage;

use Illuminate\Database\Eloquent\Builder;

class Search
{
    public static function applyFilters(Builder $query, array $filters)
    {
        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                if (is_array($value)) {
                    $query->whereIn($key, $value);
                } else {
                    $query->where($key, 'LIKE', "%$value%");
                }
            }
        }

        return $query;
    }
}
