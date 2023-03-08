<?php

namespace App\ModelFilters;

use Revalto\ModelFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    /**
     * @var array
     */
    protected array $defaults = [
        'id' => self::COMPOSITION_EQUAL,
        'title' => self::COMPOSITION_LIKE,
        'description' => self::COMPOSITION_LIKE,
        'price' => self::COMPOSITION_EQUAL,
    ];

    /**
     * @param array|null $value
     * @return void
     */
    public function createdAt(?array $value): void
    {
        $this->query->whereBetween('created_at', [
            $value[0] ?? now()->subYears(100),
            $value[1] ?? now()->addYears(100)
        ]);
    }
}
