<?php
namespace Mostafaelashhab\EasySearch;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    /**
     * إجراء البحث في الأعمدة والعلاقات.
     *
     * @param Builder $query
     * @param string $searchTerm
     * @param array $columns
     * @param array $relations
     * @return Builder
     */
    public function scopeSearch(Builder $query, $searchTerm, $columns = [], $relations = [])
    {
        // البحث في الأعمدة
        if (!empty($columns)) {
            $query->where(function ($q) use ($searchTerm, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'like', "%$searchTerm%");
                }
            });
        }

        // البحث في العلاقات
        foreach ($relations as $relation => $fields) {
            $query->orWhereHas($relation, function ($q) use ($fields, $searchTerm) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', "%$searchTerm%");
                }
            });
        }

        return $query;
    }
}
