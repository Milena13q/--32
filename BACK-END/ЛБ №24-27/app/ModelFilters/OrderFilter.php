<?php

namespace App\ModelFilters;

use Revalto\ModelFilter\ModelFilter;

class OrderFilter extends ModelFilter
{
    /**
     * @var array
     */
    protected array $defaults = [
        'id' => self::COMPOSITION_EQUAL,
        'price' => self::COMPOSITION_EQUAL,
        'client_id' => self::COMPOSITION_EQUAL,
        'status' => self::COMPOSITION_EQUAL,
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
